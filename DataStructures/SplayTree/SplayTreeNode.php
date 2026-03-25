<?php

declare(strict_types=1);

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
    public ?SplayTreeNode $left = null;

    public ?SplayTreeNode $right = null;

    public ?SplayTreeNode $parent = null;

    /**
     * @param int $key The key of the node.
     * @param mixed $value The associated value.
     */
    public function __construct(public int $key, public mixed $value)
    {
    }

    public function isLeaf(): bool
    {
        return !$this->left instanceof \DataStructures\SplayTree\SplayTreeNode && !$this->right instanceof \DataStructures\SplayTree\SplayTreeNode;
    }

    public function isRoot(): bool
    {
        return !$this->parent instanceof \DataStructures\SplayTree\SplayTreeNode;
    }
}
