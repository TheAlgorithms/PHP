<?php

declare(strict_types=1);

namespace DataStructures\CompareBinaryTree;

/**
 * Recurrent comparison of binary trees based on comparison of left and right branches
 * (https://en.wikipedia.org/wiki/Binary_tree).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class CompareBinaryTree
{
    /**
     * compare two binary trees
     */
    public function areTreesEqual(?BinaryTreeNode $a, ?BinaryTreeNode $b): bool
    {
        if (!$a instanceof \DataStructures\CompareBinaryTree\BinaryTreeNode  &&  $b instanceof \DataStructures\CompareBinaryTree\BinaryTreeNode || $a instanceof \DataStructures\CompareBinaryTree\BinaryTreeNode && !$b instanceof \DataStructures\CompareBinaryTree\BinaryTreeNode) {
            return false;
        }

        if (!$a instanceof \DataStructures\CompareBinaryTree\BinaryTreeNode && !$b instanceof \DataStructures\CompareBinaryTree\BinaryTreeNode) {
            return true;
        }

        if ($a->value !== $b->value) {
            return false;
        }

        return  $this->areTreesEqual($a->left, $b->left)
            &&  $this->areTreesEqual($a->right, $b->right);
    }
}
