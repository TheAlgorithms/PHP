<?php

class BinaryTree {
    private ?BinaryTree $left = null;
    private ?BinaryTree $right = null;
    private $value;

    public function setLeft(?BinaryTree $left)
    {
        $this->left = $left;
        return $this;
    }

    public function getLeft(): ?BinaryTree
    {
        return $this->left;
    }

    public function setRight(?BinaryTree $right)
    {
        $this->right = $right;
        return $this;
    }

    public function getRight(): ?BinaryTree
    {
        return $this->right;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }
}
