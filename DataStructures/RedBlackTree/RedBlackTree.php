<?php

namespace DataStructures;

/**
 * Internal Node class representing a single node in the Red-Black Tree
 *
 * @internal
 */
class Node
{
    const RED = 'RED';
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
        if ($this->parent === null) {
            return null;
        }
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

/**
 * Red-Black Tree implementation
 *
 * A self-balancing binary search tree that maintains balance using color properties
 * to ensure O(log n) time for insertion, deletion, and search operations.
 */
class RedBlackTree
{
    private $root;
    private $nil;

    public function __construct()
    {
        $this->nil  = new Node(null, Node::BLACK);
        $this->nil->left   = $this->nil;
        $this->nil->right  = $this->nil;
        $this->nil->parent = $this->nil;

        $this->root = $this->nil;
    }

    /**
     * Insert a value into the tree
     *
     * @param mixed $value
     */
    public function insert($value): void
    {
        $newNode = new Node($value, Node::RED, $this->nil);
        $newNode->left  = $this->nil;
        $newNode->right = $this->nil;

        $parent  = $this->nil;
        $current = $this->root;

        while ($current !== $this->nil) {
            $parent = $current;
            if ($value < $current->value) {
                $current = $current->left;
            } elseif ($value > $current->value) {
                $current = $current->right;
            } else {
                return; // Duplicate, ignore
            }
        }

        $newNode->parent = $parent;

        if ($parent === $this->nil) {
            $this->root = $newNode;
        } elseif ($value < $parent->value) {
            $parent->left = $newNode;
        } else {
            $parent->right = $newNode;
        }

        $this->fixInsert($newNode);
    }

    private function fixInsert(Node $node): void
    {
        while ($node->parent->isRed()) {
            if ($node->parent->isLeftChild()) {
                $uncle = $node->parent->parent->right;

                if ($uncle->isRed()) {
                    $node->parent->color = Node::BLACK;
                    $uncle->color        = Node::BLACK;
                    $node->parent->parent->color = Node::RED;
                    $node = $node->parent->parent;
                } else {
                    if ($node->isRightChild()) {
                        $node = $node->parent;
                        $this->rotateLeft($node);
                    }

                    $node->parent->color = Node::BLACK;
                    $node->parent->parent->color = Node::RED;
                    $this->rotateRight($node->parent->parent);
                }
            } else {
                $uncle = $node->parent->parent->left;

                if ($uncle->isRed()) {
                    $node->parent->color = Node::BLACK;
                    $uncle->color        = Node::BLACK;
                    $node->parent->parent->color = Node::RED;
                    $node = $node->parent->parent;
                } else {
                    if ($node->isLeftChild()) {
                        $node = $node->parent;
                        $this->rotateRight($node);
                    }

                    $node->parent->color = Node::BLACK;
                    $node->parent->parent->color = Node::RED;
                    $this->rotateLeft($node->parent->parent);
                }
            }
        }

        $this->root->color = Node::BLACK;
    }

    public function delete($value): bool
    {
        $node = $this->findNode($value);
        if ($node === $this->nil) {
            return false;
        }

        $this->deleteNode($node);
        return true;
    }

    private function deleteNode(Node $node): void
    {
        $y = $node;
        $yOriginalColor = $y->color;
        $x = $this->nil;

        if ($node->left === $this->nil) {
            $x = $node->right;
            $this->transplant($node, $node->right);
        } elseif ($node->right === $this->nil) {
            $x = $node->left;
            $this->transplant($node, $node->left);
        } else {
            $y = $this->getMinimum($node->right);
            $yOriginalColor = $y->color;
            $x = $y->right;

            if ($y->parent === $node) {
                $x->parent = $y;
            } else {
                $this->transplant($y, $y->right);
                $y->right = $node->right;
                $y->right->parent = $y;
            }

            $this->transplant($node, $y);
            $y->left = $node->left;
            $y->left->parent = $y;
            $y->color = $node->color;
        }

        if ($yOriginalColor === Node::BLACK) {
            $this->fixDelete($x);
        }
    }

    private function fixDelete(Node $node): void
    {
        while ($node !== $this->root && $node->isBlack()) {
            if ($node->isLeftChild()) {
                $sibling = $node->parent->right;

                if ($sibling->isRed()) {
                    $sibling->color = Node::BLACK;
                    $node->parent->color = Node::RED;
                    $this->rotateLeft($node->parent);
                    $sibling = $node->parent->right;
                }

                if ($sibling->left->isBlack() && $sibling->right->isBlack()) {
                    $sibling->color = Node::RED;
                    $node = $node->parent;
                } else {
                    if ($sibling->right->isBlack()) {
                        $sibling->left->color = Node::BLACK;
                        $sibling->color = Node::RED;
                        $this->rotateRight($sibling);
                        $sibling = $node->parent->right;
                    }

                    $sibling->color = $node->parent->color;
                    $node->parent->color = Node::BLACK;
                    $sibling->right->color = Node::BLACK;
                    $this->rotateLeft($node->parent);
                    $node = $this->root;
                }
            } else {
                $sibling = $node->parent->left;

                if ($sibling->isRed()) {
                    $sibling->color = Node::BLACK;
                    $node->parent->color = Node::RED;
                    $this->rotateRight($node->parent);
                    $sibling = $node->parent->left;
                }

                if ($sibling->right->isBlack() && $sibling->left->isBlack()) {
                    $sibling->color = Node::RED;
                    $node = $node->parent;
                } else {
                    if ($sibling->left->isBlack()) {
                        $sibling->right->color = Node::BLACK;
                        $sibling->color = Node::RED;
                        $this->rotateLeft($sibling);
                        $sibling = $node->parent->left;
                    }

                    $sibling->color = $node->parent->color;
                    $node->parent->color = Node::BLACK;
                    $sibling->left->color = Node::BLACK;
                    $this->rotateRight($node->parent);
                    $node = $this->root;
                }
            }
        }

        $node->color = Node::BLACK;
    }

    private function transplant(Node $u, Node $v): void
    {
        if ($u->parent === $this->nil) {
            $this->root = $v;
        } elseif ($u->isLeftChild()) {
            $u->parent->left = $v;
        } else {
            $u->parent->right = $v;
        }

        $v->parent = $u->parent;
    }

    public function search($value): bool
    {
        return $this->findNode($value) !== $this->nil;
    }

    private function findNode($value): Node
    {
        $current = $this->root;

        while ($current !== $this->nil) {
            if ($value < $current->value) {
                $current = $current->left;
            } elseif ($value > $current->value) {
                $current = $current->right;
            } else {
                return $current;
            }
        }

        return $this->nil;
    }

    private function rotateLeft(Node $x): void
    {
        $y = $x->right;
        $x->right = $y->left;
        if ($y->left !== $this->nil) $y->left->parent = $x;

        $y->parent = $x->parent;

        if ($x->parent === $this->nil) $this->root = $y;
        elseif ($x->isLeftChild()) $x->parent->left = $y;
        else $x->parent->right = $y;

        $y->left = $x;
        $x->parent = $y;
    }

    private function rotateRight(Node $x): void
    {
        $y = $x->left;
        $x->left = $y->right;
        if ($y->right !== $this->nil) $y->right->parent = $x;

        $y->parent = $x->parent;

        if ($x->parent === $this->nil) $this->root = $y;
        elseif ($x->isRightChild()) $x->parent->right = $y;
        else $x->parent->left = $y;

        $y->right = $x;
        $x->parent = $y;
    }

    private function getMinimum(Node $node): Node
    {
        while ($node->left !== $this->nil) $node = $node->left;
        return $node;
    }
}
