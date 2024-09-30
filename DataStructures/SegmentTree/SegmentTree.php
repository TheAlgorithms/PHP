<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request #166
 * https://github.com/TheAlgorithms/PHP/pull/166
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

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
     * Default aggregation is Sum.
     *
     * Example usage:
     *  $segmentTree = new SegmentTree($array, fn($a, $b) => max($a, $b));
     *
     * @param array $arr The input array for the segment tree
     * @param callable|null $callback Optional callback function for custom aggregation logic.
     * @throws InvalidArgumentException if the array is empty, contains non-numeric values, or is associative.
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
     * @return bool True if any element is non-numeric, false otherwise.
     */
    private function isNonNumeric(): bool
    {
        return !array_reduce($this->currentArray, fn($carry, $item) => $carry && is_numeric($item), true);
    }

    /**
     * @return bool True if the array is associative, false otherwise.
     */
    private function isAssociative(): bool
    {
        return array_keys($this->currentArray) !== range(0, $this->arraySize - 1);
    }

    /**
     * @return SegmentTreeNode The root node of the segment tree.
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
     * Builds the segment tree recursively. Takes O(n log n) in total.
     *
     * @param array $arr The input array.
     * @param int $start The starting index of the segment.
     * @param int $end The ending index of the segment.
     * @return SegmentTreeNode The root node of the constructed segment.
     */
    private function buildTree(array $arr, int $start, int $end): SegmentTreeNode
    {
            // Leaf node
        if ($start == $end) {
            return new SegmentTreeNode($start, $end, $arr[$start]);
        }

        $mid = $start + (int)(($end - $start) / 2);

            // Recursively build left and right children
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
     * Queries the aggregated value over a specified range. Takes O(log n).
     *
     * @param int $start The starting index of the range.
     * @param int $end The ending index of the range.
     * @return int|float The aggregated value for the range.
     * @throws OutOfBoundsException if the range is invalid.
     */
    public function query(int $start, int $end)
    {
        if ($start > $end || $start < 0 || $end > ($this->root->end)) {
            throw new OutOfBoundsException("Index out of bounds: start = $start, end = $end. 
            Must be between 0 and " . ($this->arraySize - 1));
        }
        return $this->queryTree($this->root, $start, $end);
    }

    /**
     * Recursively queries the segment tree for a specific range.
     *
     * @param SegmentTreeNode $node The current node.
     * @param int $start The starting index of the query range.
     * @param int $end The ending index of the query range.
     * @return int|float The aggregated value for the range.
     */
    private function queryTree(SegmentTreeNode $node, int $start, int $end)
    {
        if ($node->start == $start && $node->end == $end) {
            return $node->value;
        }

        $mid = $node->start + (int)(($node->end - $node->start) / 2);

            // Determine which segment of the tree to query
        if ($end <= $mid) {
            return $this->queryTree($node->left, $start, $end);     // Query left child
        } elseif ($start > $mid) {
            return $this->queryTree($node->right, $start, $end);    // Query right child
        } else {
                // Split query between left and right children
            $leftResult = $this->queryTree($node->left, $start, $mid);
            $rightResult = $this->queryTree($node->right, $mid + 1, $end);

            return $this->callback
                ? ($this->callback)($leftResult, $rightResult)
                : $leftResult + $rightResult;                   // Default sum if no callback
        }
    }

    /**
     * Updates the value at a specified index in the segment tree. Takes O(log n).
     *
     * @param int $index The index to update.
     * @param int|float $value The new value to set.
     * @throws OutOfBoundsException if the index is out of bounds.
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
     * @param SegmentTreeNode $node The current node.
     * @param int $index The index to update.
     * @param int|float $value The new value.
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

    /**
     * Performs a range update on a specified segment.
     *
     * @param int $start The starting index of the range.
     * @param int $end The ending index of the range.
     * @param int|float $value The value to set for the range.
     * @throws OutOfBoundsException if the range is invalid.
     */
    public function rangeUpdate(int $start, int $end, $value): void
    {
        if ($start < 0 || $end >= $this->arraySize || $start > $end) {
            throw new OutOfBoundsException("Invalid range: start = $start, end = $end.");
        }
        $this->rangeUpdateTree($this->root, $start, $end, $value);

            // Update the original array to reflect the range update
        $this->currentArray = array_replace($this->currentArray, array_fill_keys(range($start, $end), $value));
    }

    /**
     * Recursively performs a range update in the segment tree.
     *
     * @param SegmentTreeNode $node The current node.
     * @param int $start The starting index of the range.
     * @param int $end The ending index of the range.
     * @param int|float $value The new value for the range.
     */
    private function rangeUpdateTree(SegmentTreeNode $node, int $start, int $end, $value): void
    {
            // Leaf node
        if ($node->start == $node->end) {
            $node->value = $value;
            return;
        }

        $mid = $node->start + (int)(($node->end - $node->start) / 2);

            // Determine which segment of the tree to update (Left, Right, Split respectively)
        if ($end <= $mid) {
            $this->rangeUpdateTree($node->left, $start, $end, $value);  // Entire range is in the left child
        } elseif ($start > $mid) {
            $this->rangeUpdateTree($node->right, $start, $end, $value); // Entire range is in the right child
        } else {
                // Range is split between left and right children
            $this->rangeUpdateTree($node->left, $start, $mid, $value);
            $this->rangeUpdateTree($node->right, $mid + 1, $end, $value);
        }

            // Recompute the value of the current node after the update
        $node->value = $this->callback
            ? ($this->callback)($node->left->value, $node->right->value)
            : $node->left->value + $node->right->value;
    }

    /**
     * Serializes the segment tree into a JSON string.
     *
     * @return string The serialized segment tree as a JSON string.
     */
    public function serialize(): string
    {
        return json_encode($this->serializeTree($this->root));
    }

    /**
     * Recursively serializes the segment tree.
     *
     * @param SegmentTreeNode|null $node The current node.
     * @return array The serialized representation of the node.
     */
    private function serializeTree(?SegmentTreeNode $node): array
    {
        if ($node === null) {
            return [];
        }
        return [
            'start' => $node->start,
            'end' => $node->end,
            'value' => $node->value,
            'left' => $this->serializeTree($node->left),
            'right' => $this->serializeTree($node->right),
        ];
    }

    /**
     * Deserializes a JSON string into a SegmentTree object.
     *
     * @param string $data The JSON string to deserialize.
     * @return SegmentTree The deserialized segment tree.
     */
    public static function deserialize(string $data): self
    {
        $array = json_decode($data, true);

        $initialiseArray = array_fill(0, $array['end'] + 1, 0);
        $segmentTree = new self($initialiseArray);

        $segmentTree->root = $segmentTree->deserializeTree($array);
        return $segmentTree;
    }

    /**
     * Recursively deserializes a segment tree from an array representation.
     *
     * @param array $data The serialized data for the node.
     * @return SegmentTreeNode|null The deserialized node.
     */
    private function deserializeTree(array $data): ?SegmentTreeNode
    {
        if (empty($data)) {
            return null;
        }
        $node = new SegmentTreeNode($data['start'], $data['end'], $data['value']);

        $node->left = $this->deserializeTree($data['left']);
        $node->right = $this->deserializeTree($data['right']);
        return $node;
    }
}
