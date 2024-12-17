<?php

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
     * @param BinaryTreeNode|null $a
     * @param BinaryTreeNode|null $b
     * @return bool
     */
    public function areTreesEqual(?BinaryTreeNode $a, ?BinaryTreeNode $b): bool
    {
        if (! $a  &&  $b || $a && ! $b) {
            return false;
        }

        if (! $a && ! $b) {
            return true;
        }

        if ($a->value !== $b->value) {
            return false;
        }
        return  $this->areTreesEqual($a->left, $b->left)
            &&  $this->areTreesEqual($a->right, $b->right);
    }
}
