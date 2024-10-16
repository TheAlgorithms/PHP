<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #174
 * https://github.com/TheAlgorithms/PHP/pull/174
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\BinarySearchTree;

use Iterator;

/**
 * Provides tree nodes in several traversal algorithms.
 *
 * Implements the Iterator Interface. Allows tree traversal using loops in tree in-order manner.
 */
class BinaryTreeTraversal implements Iterator
{
    private array $iterationNodes = [];         // To store nodes for iteration
    protected const IN_ORDER = 'inOrder';
    private const PRE_ORDER = 'preOrder';
    private const POST_ORDER = 'postOrder';
    protected string $traversalType;
    private int $currentPosition = 0;

    /**
     * Helps switch traversal type of the binary tree for the Iterator interface
     */
    public function setTraversalType(string $traversalType): void
    {
        $this->traversalType = $traversalType;

        // Reset iterator with new traversal
        $this->rewind();
    }

    /**
     * Helper to populate iteration nodes per traversal ype
     */
    private function loadTraversedNodes(): void
    {
        switch ($this->traversalType) {
            case self::PRE_ORDER:
                $this->preOrderIterator(static::getRoot());
                break;

            case self::POST_ORDER:
                $this->postOrderIterator(static::getRoot());
                break;

            case self::IN_ORDER:
            default:
                $this->inOrderIterator(static::getRoot());
        }
    }

    /**
     * Returns a flat associative array structure for inOrder Traversal
     */
    protected function inOrder(?BSTNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result += $this->inOrder($node->left);
            $result[$node->key] = $node->value;
            $result += $this->inOrder($node->right);
        }
        return $result;
    }

    /**
     * Returns a flat associative array structure for preOrder Traversal
     */
    protected function preOrder(?BSTNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result[$node->key] = $node->value;
            $result += $this->preOrder($node->left);
            $result += $this->preOrder($node->right);
        }
        return $result;
    }

    /**
     * Returns a flat associative array structure for postOrder Traversal
     */
    protected function postOrder(?BSTNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result += $this->postOrder($node->left);
            $result += $this->postOrder($node->right);
            $result[$node->key] = $node->value;
        }
        return $result;
    }

    /**
     *  Returns a flat associative array structure for BFT Traversal
     */
    protected function breadthFirst(?BSTNode $node): array
    {
        $result = [];
        if (!isset($node)) {
            return $result;
        }

        $queue = [];
        $queue[] = $node;

        while (!empty($queue)) {
            $currentNode = array_shift($queue);
            $result[$currentNode->key] = $currentNode->value;

            if ($currentNode->left !== null) {
                $queue[] = $currentNode->left;
            }

            if ($currentNode->right !== null) {
                $queue[] = $currentNode->right;
            }
        }
        return $result;
    }

    /**
     * Rewind the iterator to the first element.
     */
    public function rewind(): void
    {
        $this->iterationNodes = [];
        $this->currentPosition = 0;

        // Load nodes based on traversal type
        $this->loadTraversedNodes();
    }

    /**
     * Return the current element if exists
     */
    public function current(): ?BSTNode
    {
        return $this->iterationNodes[$this->currentPosition] ?? null;
    }

    /**
     * Return the key of the current element.
     */
    public function key(): int
    {
        return $this->currentPosition;
    }

    /**
     * Move forward to the next element.
     */
    public function next(): void
    {
        $this->currentPosition++;
    }

    /**
     * Check if the current position is valid.
     */
    public function valid(): bool
    {
        return isset($this->iterationNodes[$this->currentPosition]);
    }

    /**
     * Helper function to traverse the tree in-order and fill the $inOrderNodes array.
     */
    private function inOrderIterator(?BSTNode $node): void
    {
        if ($node !== null) {
            $this->inOrderIterator($node->left);
            $this->iterationNodes[] = $node;
            $this->inOrderIterator($node->right);
        }
    }
    /**
     * Helper function to traverse the tree in-order and fill the $preOrderNodes array.
     */
    private function preOrderIterator(?BSTNode $node): void
    {
        if ($node !== null) {
            $this->iterationNodes[] = $node;
            $this->preOrderIterator($node->left);
            $this->preOrderIterator($node->right);
        }
    }
    /**
     * Helper function to traverse the tree in-order and fill the $postOrderNodes array.
     */
    private function postOrderIterator(?BSTNode $node): void
    {
        if ($node !== null) {
            $this->postOrderIterator($node->left);
            $this->postOrderIterator($node->right);
            $this->iterationNodes[] = $node;
        }
    }
}
