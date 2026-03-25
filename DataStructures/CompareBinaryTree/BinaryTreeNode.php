<?php

declare(strict_types=1);

namespace DataStructures\CompareBinaryTree;

class BinaryTreeNode
{
    public function __construct(public $value, public ?BinaryTreeNode $left = null, public ?BinaryTreeNode $right = null)
    {
    }
}
