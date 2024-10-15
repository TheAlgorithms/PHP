<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #168
 * https://github.com/TheAlgorithms/PHP/pull/168
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\SplayTree;

abstract class SplayTreeRotations
{
    abstract protected function splay(?SplayTreeNode $node, int $key): ?SplayTreeNode;
    abstract protected function setRoot(SplayTreeNode $node): void;

    /**
     * Zig rotation (single right rotation).
     * Performs a right rotation on the given node.
     * A case where the node is directly a left child of its parent.
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after rotation.
     */
    protected function zig(SplayTreeNode $node): SplayTreeNode
    {
        return $this->rotateRight($node);
    }

    /**
     * Zag rotation (single left rotation).
     * Performs a left rotation on the given node.
     * A case where the node is directly a right child of its parent.
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after rotation.
     */
    protected function zag(SplayTreeNode $node): SplayTreeNode
    {
        return $this->rotateLeft($node);
    }

    /**
     * Zig-Zig rotation (double right rotation).
     * Performs two consecutive right rotations on the given node. The first right rotation is applied to
     * the node’s parent, and the second one to the node’s new parent (the previous grandparent).
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after the rotations.
     */
    protected function zigZig(SplayTreeNode $node): SplayTreeNode
    {
        $node = $this->rotateRight($node);
        return $this->rotateRight($node);
    }

    /**
     * Zag-Zag rotation (double left rotation).
     * Performs two consecutive left rotations on the given node. The first left rotation is applied to
     * the node’s parent, and the second one to the node’s new parent (the previous grandparent).
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after the rotations.
     */
    protected function zagZag(SplayTreeNode $node): SplayTreeNode
    {
        $node = $this->rotateLeft($node);
        return $this->rotateLeft($node);
    }

    /**
     * Zig-Zag rotation (left-right rotation).
     * Performs a left rotation on the left child followed by a right rotation on the node itself.
     *
     * A case when the target key is in the right subtree of the left child.
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after the rotations.
     */
    protected function zigZag(SplayTreeNode $node): SplayTreeNode
    {
        $node->left = $this->rotateLeft($node->left);
        return $this->rotateRight($node);
    }

    /**
     * Zag-Zig rotation (right-left rotation).
     * Performs a right rotation on the right child followed by a left rotation on the node itself.
     *
     * A case when the target key is in the left subtree of the right child.
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after the rotations.
     */
    protected function zagZig(SplayTreeNode $node): SplayTreeNode
    {
        $node->right = $this->rotateRight($node->right);
        return $this->rotateLeft($node);
    }

    /**
     * Rotates the given node to the left, bringing its right child up to take its place.
     * The left subtree of the node's right child will become the new right subtree of the node.
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after the rotation (the former right child).
     */
    private function rotateLeft(SplayTreeNode $node): SplayTreeNode
    {
        $rightChild = $node->right;

        if ($rightChild === null) {
            return $node; // No rotation possible
        }

        $node->right = $rightChild->left;

        if ($rightChild->left !== null) {
            $rightChild->left->parent = $node;
        }

        $rightChild->parent = $node->parent;

        if ($node->parent === null) {
            static::setRoot($rightChild);
        } elseif ($node === $node->parent->left) {
            $node->parent->left = $rightChild;
        } else {
            $node->parent->right = $rightChild;
        }

        $rightChild->left = $node;
        $node->parent = $rightChild;

        return $rightChild;
    }

    /**
     * Rotates the given node to the right, bringing its left child up to take its place.
     * The right subtree of the node's left child will become the new left subtree of the node.
     *
     * @param SplayTreeNode $node The node to be rotated.
     * @return SplayTreeNode The new root of the subtree after the rotation (the former left child).
     */
    private function rotateRight(SplayTreeNode $node): SplayTreeNode
    {
        $leftChild = $node->left;

        if ($leftChild === null) {
            return $node;       // No rotation possible
        }

        $node->left = $leftChild->right;

        if ($leftChild->right !== null) {
            $leftChild->right->parent = $node;
        }

        $leftChild->parent = $node->parent;

        if ($node->parent === null) {
            static::setRoot($leftChild);
        } elseif ($node === $node->parent->right) {
            $node->parent->right = $leftChild;
        } else {
            $node->parent->left = $leftChild;
        }

        $leftChild->right = $node;
        $node->parent = $leftChild;

        return $leftChild;
    }
}
