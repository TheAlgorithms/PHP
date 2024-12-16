<?php
namespace DataStructures\CompareBinaryTree;

class Node
{
    public function __construct($value, ?Node $left = null, Node $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    public $value;
    public ?Node $left;
    public ?Node $right;
}
