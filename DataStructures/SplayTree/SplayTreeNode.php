<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #168
 * https://github.com/TheAlgorithms/PHP/pull/168
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\SplayTree;

class SplayTreeNode
{
    /**
     * @var int|string
     */
    public int $key;
    /**
     * @var mixed
     */
    public $value;
    public ?SplayTreeNode $left;
    public ?SplayTreeNode $right;
    public ?SplayTreeNode $parent;

    /**
     * @param int $key The key of the node.
     * @param mixed $value The associated value.
     */
    public function __construct(int $key, $value)
    {
        $this->key = $key;
        $this->value = $value;

        // Set all node pointers to null initially
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }

    public function isLeaf(): bool
    {
        return $this->left === null && $this->right === null;
    }

    public function isRoot(): bool
    {
        return $this->parent === null;
    }
}
