<?php

namespace DataStructures\SegmentTree;

use InvalidArgumentException;

class SegmentTree
{
    private SegmentTreeNode $root;
    private array $currentArray;    // holds the original array
    private int $arraySize;
    private $callback;              // Callback function for aggregation

    /**
     * Initializes the segment tree with the provided array and optional callback for aggregation.
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
     * Gets the root node of the segment tree.
     *
     * @return SegmentTreeNode The root node of the segment tree
     */
    public function getRoot(): SegmentTreeNode
    {
        return $this->root;
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
        if ($start == $end) {
            return new SegmentTreeNode($start, $end, $arr[$start]);
        }

        $mid = $start + (int)(($end - $start) / 2);

        $leftChild = $this->buildTree($arr, $start, $mid);
        $rightChild = $this->buildTree($arr, $mid + 1, $end);

        $node = new SegmentTreeNode($start, $end, $this->callback
            ? ($this->callback)($leftChild->value, $rightChild->value)
            : $leftChild->value + $rightChild->value);                  // falls back to sum if no callback is given

        $node->left = $leftChild;
        $node->right = $rightChild;

        return $node;
    }
}
