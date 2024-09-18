<?php

namespace DataStructures\AVLTree;

class AVLTreeNode
{
    /**
     * @var int|string
     */
    public $key;
    /**
     * @var mixed
     */
    public $value;
    public ?AVLTreeNode $left;
    public ?AVLTreeNode $right;
    public int $height;

    public function __construct($key, $value, ?AVLTreeNode $left = null, ?AVLTreeNode $right = null)
    {
        $this->key = $key;
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
        $this->height = 1; // New node is initially at height 1
    }

    public function updateHeight(): void
    {
        $leftHeight = $this->left ? $this->left->height : 0;
        $rightHeight = $this->right ? $this->right->height : 0;
        $this->height = max($leftHeight, $rightHeight) + 1;
    }

    public function balanceFactor(): int
    {
        $leftHeight = $this->left ? $this->left->height : 0;
        $rightHeight = $this->right ? $this->right->height : 0;
        return $leftHeight - $rightHeight;
    }
}
