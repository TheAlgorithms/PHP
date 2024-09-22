<?php

namespace DataStructures\SegmentTree;

use InvalidArgumentException;
use OutOfBoundsException;

class SegmentTree
{
    private SegmentTreeNode $root;  // Root node of the segment tree
    private array $currentArray;    // holds the original array and updates reflections
    private int $arraySize;         // Size of the original array
    private $callback;              // Callback function for aggregation

    /**
     * Initializes the segment tree with the provided array and optional callback for aggregation.
     * Default aggregation is Sum
     *
     * Example usage:
     *  $segmentTree = new SegmentTree($array, fn($a, $b) => max($a, $b));
     *
     * @param array $arr The input array for the segment tree
     * @param callable|null $callback Optional callback function for custom aggregation logic
     * @throws InvalidArgumentException if the array is empty, contains non-numeric values, or is associative
     */
    public function __construct(array $arr, callable $callback = null)
    {
        $this->currentArray = $arr;
        $this->arraySize = count($this->currentArray);
        $this->callback = $callback;

        if ($this->isUnsupportedArray()) {
            throw new InvalidArgumentException("Array must not be empty, must contain numeric values 
            and must be non-associative.");
        }

        $this->root = $this->buildTree($this->currentArray, 0, $this->arraySize - 1);
    }

    private function isUnsupportedArray(): bool
    {
        return empty($this->currentArray) || $this->isNonNumeric() || $this->isAssociative();
    }

    /**
     * @return bool True if any element is non-numeric, false otherwise
     */
    private function isNonNumeric(): bool
    {
        return !array_reduce($this->currentArray, fn($carry, $item) => $carry && is_numeric($item), true);
    }

    /**
     * @return bool True if the array is associative, false otherwise
     */
    private function isAssociative(): bool
    {
        return array_keys($this->currentArray) !== range(0, $this->arraySize - 1);
    }

    /**
     * @return SegmentTreeNode The root node of the segment tree
     */
    public function getRoot(): SegmentTreeNode
    {
        return $this->root;
    }

    /**
     * @return array The original or the current array (after any update) stored in the segment tree.
     */
    public function getCurrentArray(): array
    {
        return $this->currentArray;
    }

    /**
     * Builds the segment tree recursively.
     *
     * @param array $arr The input array
     * @param int $start The starting index of the segment
     * @param int $end The ending index of the segment
     * @return SegmentTreeNode The root node of the constructed segment
     */
    private function buildTree(array $arr, int $start, int $end): SegmentTreeNode
    {
        // Leaf node
        if ($start == $end) {
            return new SegmentTreeNode($start, $end, $arr[$start]);
        }

        $mid = $start + (int)(($end - $start) / 2);

        $leftChild = $this->buildTree($arr, $start, $mid);
        $rightChild = $this->buildTree($arr, $mid + 1, $end);

        $node = new SegmentTreeNode($start, $end, $this->callback
            ? ($this->callback)($leftChild->value, $rightChild->value)
            : $leftChild->value + $rightChild->value);

        // Link the children to the parent node
        $node->left = $leftChild;
        $node->right = $rightChild;

        return $node;
    }

    /**
     * Updates the value at a specified index in the segment tree.
     *
     * @param int $index The index to update
     * @param int|float $value The new value to set
     * @throws OutOfBoundsException if the index is out of bounds
     */
    public function update(int $index, int $value): void
    {
        if ($index < 0 || $index >= $this->arraySize) {
            throw new OutOfBoundsException("Index out of bounds: $index. Must be between 0 and "
                . ($this->arraySize - 1));
        }

        $this->updateTree($this->root, $index, $value);
        $this->currentArray[$index] = $value;           // Reflect the update in the original array
    }

    /**
     * Recursively updates the segment tree.
     *
     * @param SegmentTreeNode $node The current node
     * @param int $index The index to update
     * @param int|float $value The new value
     */
    private function updateTree(SegmentTreeNode $node, int $index, $value): void
    {
        // Leaf node
        if ($node->start == $node->end) {
            $node->value = $value;
            return;
        }

        $mid = $node->start + (int)(($node->end - $node->start) / 2);

        // Decide whether to go to the left or right child
        if ($index <= $mid) {
            $this->updateTree($node->left, $index, $value);
        } else {
            $this->updateTree($node->right, $index, $value);
        }

        // Recompute the value of the current node after the update
        $node->value = $this->callback
            ? ($this->callback)($node->left->value, $node->right->value)
            : $node->left->value + $node->right->value;
    }
}
