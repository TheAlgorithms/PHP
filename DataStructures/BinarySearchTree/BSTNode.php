<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #174
 * https://github.com/TheAlgorithms/PHP/pull/174
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\BinarySearchTree;

class BSTNode
{
    public int $key;
    /**
     * @var mixed
     */
    public $value;
    public ?BSTNode $left;
    public ?BSTNode $right;
    public ?BSTNode $parent;

    /**
     * @param int $key The key of the node.
     * @param mixed $value The associated value.
     */
    public function __construct(int $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }

    public function isRoot(): bool
    {
        return $this->parent === null;
    }

    public function isLeaf(): bool
    {
        return $this->left === null && $this->right === null;
    }

    public function getChildren(): array
    {
        if ($this->isLeaf()) {
            return [];
        }

        $children = [];
        if ($this->left !== null) {
            $children['left'] = $this->left;
        }
        if ($this->right !== null) {
            $children['right'] = $this->right;
        }
        return $children;
    }
    public function getChildrenCount(): int
    {
        return count($this->getChildren());
    }
}
