<?php

namespace DataStructures;

/**
 * Internal Node class representing a single node in the Red-Black Tree
 *
 * @internal
 */
class Node
{
    const RED   = 'RED';
    const BLACK = 'BLACK';

    public $value;
    public $color;
    public $left;
    public $right;
    public $parent;

    /**
     * Node constructor
     *
     * @param mixed $value
     * @param string $color
     * @param Node|null $parent
     */
    public function __construct($value, $color = self::RED, $parent = null)
    {
        $this->value  = $value;
        $this->color  = $color;
        $this->parent = $parent;
        $this->left   = null;
        $this->right  = null;
    }

    public function isRed(): bool
    {
        return $this->color === self::RED;
    }

    public function isBlack(): bool
    {
        return $this->color === self::BLACK;
    }

    public function sibling(): ?Node
    {
        if ($this->parent === null) return null;
        return $this->parent->left === $this ? $this->parent->right : $this->parent->left;
    }

    public function isLeftChild(): bool
    {
        return $this->parent !== null && $this->parent->left === $this;
    }

    public function isRightChild(): bool
    {
        return $this->parent !== null && $this->parent->right === $this;
    }

    public function hasRedChild(): bool
    {
        return ($this->left !== null && $this->left->isRed()) ||
               ($this->right !== null && $this->right->isRed());
    }
}
