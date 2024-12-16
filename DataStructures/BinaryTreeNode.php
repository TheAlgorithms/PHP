<?php
namespace DataStructures;

class BinaryTreeNode
{
    public function __construct($value, ?BinaryTreeNode $left = null, BinaryTreeNode $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    public $value;
    public ?BinaryTreeNode $left;
    public ?BinaryTreeNode $right;
}
