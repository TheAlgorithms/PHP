<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #163
 * https://github.com/TheAlgorithms/PHP/pull/163
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\AVLTree;

abstract class TreeTraversal
{
    /**
     * Perform an in-order traversal of the subtree.
     * Recursively traverses the subtree rooted at the given node.
     */
    public static function inOrder(?AVLTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result = array_merge($result, self::inOrder($node->left));
            $result[] = [$node->key => $node->value];
            $result = array_merge($result, self::inOrder($node->right));
        }
        return $result;
    }

    /**
     * Perform a pre-order traversal of the subtree.
     * Recursively traverses the subtree rooted at the given node.
     */
    public static function preOrder(?AVLTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result[] = [$node->key => $node->value];
            $result = array_merge($result, self::preOrder($node->left));
            $result = array_merge($result, self::preOrder($node->right));
        }
        return $result;
    }

    /**
     * Perform a post-order traversal of the subtree.
     * Recursively traverses the subtree rooted at the given node.
     */
    public static function postOrder(?AVLTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result = array_merge($result, self::postOrder($node->left));
            $result = array_merge($result, self::postOrder($node->right));
            $result[] = [$node->key => $node->value];
        }
        return $result;
    }

    /**
     * Perform a breadth-first traversal of the AVL Tree.
     */
    public static function breadthFirst(?AVLTreeNode $root): array
    {
        $result = [];
        if ($root === null) {
            return $result;
        }

        $queue = [];
        $queue[] = $root;

        while (!empty($queue)) {
            $currentNode = array_shift($queue);
            $result[] = [$currentNode->key => $currentNode->value];

            if ($currentNode->left !== null) {
                $queue[] = $currentNode->left;
            }

            if ($currentNode->right !== null) {
                $queue[] = $currentNode->right;
            }
        }

        return $result;
    }
}
