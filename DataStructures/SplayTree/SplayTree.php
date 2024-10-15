<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #168
 * https://github.com/TheAlgorithms/PHP/pull/168
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\SplayTree;

require_once 'SplayTreeRotations.php';

use LogicException;

class SplayTree extends SplayTreeRotations
{
    protected ?SplayTreeNode $root = null;
    private int $counter = 0;

    /**
     * Initializes the splay tree with an optional array.
     * Otherwise, with manual insert() after initialization.
     *
     * @param array $initialData The input array for the splay tree
     */
    public function __construct(array $initialData = [])
    {
        foreach ($initialData as $key => $value) {
            $this->insert($key, $value);
        }
    }

    /**
     * @return SplayTreeNode|NULL The root node of the Splay Tree.
     */
    public function getRoot(): ?SplayTreeNode
    {
        return $this->root;
    }

    /**
     * Set the root node of the Splay Tree.
     * @param SplayTreeNode $node
     */
    protected function setRoot(SplayTreeNode $node): void
    {
        $this->root = $node;
    }

    /**
     * Get the number of nodes in the Splay Tree.
     */
    public function size(): int
    {
        return $this->counter;
    }

    /**
     * Check if current splay tree is empty
     */
    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    /**
     * Splay the given node to the root of the tree.
     * Keep rotating until the node becomes the root.
     *
     * Time complexity: Amortized O(log n)
     *
     * @param SplayTreeNode|NULL $node The current node being splayed
     * @param int $key The node's key being searched for and splayed
     * @return SplayTreeNode|NULL Returns the new root after splaying
     */
    protected function splay(?SplayTreeNode $node, int $key): ?SplayTreeNode
    {
        if ($node === null || $node->key === $key) {
            return $node;
        }

        return $node->key > $key
            ? $this->splayLeft($node, $key)      // Key is in the Left subtree
            : $this->splayRight($node, $key);    // Key is in the Right subtree
    }

    /**
     * Handles the splay operation when the key is located in the left subtree.
     * This includes Zig-Zig (Left-Left), Zig-Zag (Left-Right), and Zig (Left) cases.
     *
     *  Time complexity: Amortized O(log n).
     *
     * @param SplayTreeNode|null $node The root node of the subtree to splay
     * @param int $key The key to splay to the root
     * @return SplayTreeNode|null Returns the new root after splaying
    */
    private function splayLeft(?SplayTreeNode $node, int $key): ?SplayTreeNode
    {
        if ($node->left === null) {
            return $node;   // Key not found in the left subtree
        }

        if ($node->left->key > $key) {                  // Zig-Zig (Left-Left case)
            $node->left->left = $this->splay($node->left->left, $key);
            return $this->zigZig($node);
        } elseif ($node->left->key < $key) {            // Zig-Zag (Left-Right case)
            $node->left->right = $this->splay($node->left->right, $key);

            if ($node->left->right !== null) {
                return $this->zigZag($node);
            }
        }
        // Zig (Left case)
        return $node->left === null
            ? $node
            : $this->zig($node);
    }

    /**
     *  Handles the splay operation when the key is located in the right subtree.
     *  This includes Zag-Zag (Right-Right), Zag-Zig (Right-Left), and Zag (Right) cases.
     *
     * Time complexity: Amortized O(log n).
     *
     * @param SplayTreeNode|null $node The root node of the subtree to splay
     * @param int $key The key to splay to the root
     * @return SplayTreeNode|null Returns the new root after splaying
    */
    private function splayRight(?SplayTreeNode $node, int $key): ?SplayTreeNode
    {
        if ($node->right === null) {
            return $node;
        }

        if ($node->right->key < $key) {         // Zag-Zag (Right-Right case)
            $node->right->right = $this->splay($node->right->right, $key);

            return $this->zagZag($node);
        } elseif ($node->right->key > $key) {   // Zag-Zig (Right-Left case)
            $node->right->left = $this->splay($node->right->left, $key);

            if ($node->right->left !== null) {
                return $this->zagZig($node);
            }
        }

        // Zag (Right case)
        return $node->right === null
            ? $node
            : $this->zag($node);
    }

    /**
     * Insert a new element into the splay tree following binary search tree insertion.
     * Then, apply rotations to bring the newly inserted node to the root of the tree.
     *
     * Time complexity: O(log n) for the splay operation.
     *
     * @param int $key The node's key to insert
     * @param mixed $value The value associated with the key
     * @return SplayTreeNode|null Returns the new root after insertion and splaying
     * @throws LogicException If the key already exists
     */
    public function insert(int $key, $value): ?SplayTreeNode
    {
        $this->root = $this->insertNode($this->root, $key, $value);
        $this->counter++;

        return $this->splay($this->root, $key);
    }

    /**
     * Insert a key-value pair into the Splay Tree.
     * Recursively inserts a node in the BST fashion and update parent references.
     *
     * Time complexity: O(log n) for binary search tree insertion.
     *
     * @param SplayTreeNode|null $node The (sub)tree's root node to start inserting after
     * @param int $key The node's key to insert
     * @param mixed $value The value associated with the key
     * @return SplayTreeNode|null Returns the new root after insertion
     * @throws LogicException If the key already exists
     */
    private function insertNode(?SplayTreeNode $node, int $key, $value): SplayTreeNode
    {
        if ($node === null) {
            return new SplayTreeNode($key, $value);
        }

        if ($key < $node->key) {
            $node->left = $this->insertNode($node->left, $key, $value);
            $node->left->parent = $node;
        } elseif ($key > $node->key) {
            $node->right = $this->insertNode($node->right, $key, $value);
            $node->right->parent = $node;
        } else {
            throw new LogicException("Duplicate key: " . $key);
        }

        return $node;
    }

    /**
     * Search for an element in the tree by performing a binary search tree search.
     * If the node is found, apply rotations to bring it to the root of the tree.
     * Otherwise, apply rotations to the last node visited in the search.
     *
     * Time complexity: O(log n) for the splay operation.
     *
     * @param int $key The node's key being searched
     * @return SplayTreeNode|null Returns the new root of either the found node or the last visited
     */
    public function search(int $key): ?SplayTreeNode
    {
        if ($this->isEmpty()) {
            return null;
        }

        //
        $lastVisited = null;

        $node = $this->searchNode($this->root, $key, $lastVisited);

        $this->root = $node !== null
            ? $this->splay($this->root, $key)
            : $this->splay($this->root, $lastVisited->key);

        return $this->root;
    }

    /**
     * Recursively searches for a node in the BST fashion.
     *
     * Time complexity: O(log n) for binary search tree search.
     *
     * @param SplayTreeNode|null $node The (sub)tree's root node to start searching from
     * @param int $key  The node's key being searched
     * @param SplayTreeNode|null $lastVisited Keep track of the last visited node
     * @return SplayTreeNode|null Returns the new root of the found node or Null
     */
    private function searchNode(?SplayTreeNode $node, int $key, ?SplayTreeNode &$lastVisited): ?SplayTreeNode
    {
        if ($node === null) {
            return null;
        }

        $lastVisited = $node;

        if ($key < $node->key) {
            return $this->searchNode($node->left, $key, $lastVisited);
        } elseif ($key > $node->key) {
            return $this->searchNode($node->right, $key, $lastVisited);
        } else {
            return $node;
        }
    }

    /**
     * Check if a node with the given key exists in the tree.
     * Apply rotations to the searched node or to the last visited node to the root of the tree.
     *
     * Time complexity: O(log n) for the splay operation.
     *
     * @param int $key The key of the node being searched
     * @return bool True if the node exists, false otherwise
     */
    public function isFound(int $key): bool
    {
        $foundNode = $this->search($key);
        return $foundNode && $foundNode->key === $key;
    }

    /**
     * Updates the value of the node with the given key.
     * If the node is found, update its value and apply rotations to bring it to the root of the tree.
     * Otherwise, apply rotations to the last node visited in the search.
     *
     * Time complexity: O(log n) for the splay operation.
     *
     * @param int $key The key of the node to update
     * @param mixed $value The new value to set
     * @return SplayTreeNode|null Returns the root of the tree after the update or the last visited
     */
    public function update(int $key, $value): ?SplayTreeNode
    {
        if ($this->isFound($key)) {
            $this->root->value = $value;
        }
        return $this->root;
    }

    /**
     * Deletes the node with the given key from the tree.
     * Splays the node to be deleted to the root, then isolates it and restructures the tree.
     * If the key doesn't exist, apply rotations to bring the closest node to the root.
     *
     * Time complexity: O(log n) for the splay operation and O(log n) for restructuring the tree.
     *
     * @param int $key The key of the node to delete
     * @return SplayTreeNode|null The new root after the deletion
     * @throws LogicException If the key is not found in the tree
     */
    public function delete(int $key): ?SplayTreeNode
    {
        if (!$this->isFound($key)) {
            throw new LogicException("Key: " . $key . " not found in tree. Splayed the last visited node.");
        }

        $leftSubtree = $this->root->left;
        $rightSubtree = $this->root->right;

        $this->isolateRoot();
        $this->counter--;
        return $this->restructureAfterDeletion($leftSubtree, $rightSubtree);
    }

    /**
     * Isolates the root node by breaking its connections.
     */
    private function isolateRoot(): void
    {
        if ($this->root->left !== null) {
            $this->root->left->parent = null;
        }
        if ($this->root->right !== null) {
            $this->root->right->parent = null;
        }

        $this->root->left = null;
        $this->root->right = null;
    }

    /**
     * Restructures the tree after the root node has been isolated for deletion.
     *
     * @return SplayTreeNode|null The new root after restructuring
     */
    private function restructureAfterDeletion(?SplayTreeNode $leftSubtree, ?SplayTreeNode $rightSubtree): ?SplayTreeNode
    {
        if ($leftSubtree === null) {
            return $this->handleEmptyLeftSubtree($rightSubtree);
        }

        return $this->mergeSubtrees($leftSubtree, $rightSubtree);
    }

    /**
     * Handles the case when the left subtree is empty after deletion.
     *
     * @param SplayTreeNode|null $rightSubtreeRoot The root of the right subtree
     * @return SplayTreeNode|null The new root
     */
    private function handleEmptyLeftSubtree(?SplayTreeNode $rightSubtreeRoot): ?SplayTreeNode
    {
        $this->root = $rightSubtreeRoot;
        if ($this->root !== null) {
            $this->root->parent = null;
        }
        return $this->root;
    }

    /**
     * Merges the left and right subtrees after deletion.
     *
     * @param SplayTreeNode $leftSubtreeRoot The root of the left subtree
     * @param SplayTreeNode|null $rightSubtreeRoot The root of the right subtree
     * @return SplayTreeNode The new root after merging
     */
    private function mergeSubtrees(SplayTreeNode $leftSubtreeRoot, ?SplayTreeNode $rightSubtreeRoot): SplayTreeNode
    {
        $maxLeftNode = $this->maxNode($leftSubtreeRoot);
        $this->root = $maxLeftNode;

        $this->detachMaxNodeFromLeftSubtree($maxLeftNode, $leftSubtreeRoot);
        $this->attachRightSubtree($rightSubtreeRoot);

        return $this->root;
    }

    /**
     * Detaches the max node from the left subtree and reattaches the left subtree to the new root.
     *
     * @param SplayTreeNode $maxLeftNode The max node of the left subtree
     * @param SplayTreeNode $leftSubtreeRoot The root of the left subtree
     */
    private function detachMaxNodeFromLeftSubtree(SplayTreeNode $maxLeftNode, SplayTreeNode $leftSubtreeRoot): void
    {
        $maxLeftNodeParent = $maxLeftNode->parent;
        if ($maxLeftNodeParent !== null) {
            $maxLeftNodeParent->right = null;
            $this->root->left = $leftSubtreeRoot;
            $leftSubtreeRoot->parent = $this->root;
        }
        $maxLeftNode->parent = null;
    }

    /**
     * Attaches the right subtree to the new root.
     *
     * @param SplayTreeNode|null $rightSubtreeRoot The root of the right subtree
     */
    private function attachRightSubtree(?SplayTreeNode $rightSubtreeRoot): void
    {
        $this->root->right = $rightSubtreeRoot;
        if ($rightSubtreeRoot !== null) {
            $rightSubtreeRoot->parent = $this->root;
        }
    }

    /**
     * Finds the node with the maximum key in the given subtree.
     *
     * Time complexity: O(log n) for finding the maximum node in the subtree.
     *
     * @param SplayTreeNode|null $node The subtree to search for the maximum node
     * @return SplayTreeNode|null The node with the maximum key, or null if the subtree is empty
     */
    public function maxNode(?SplayTreeNode $node): ?SplayTreeNode
    {
        if ($node === null) {
            return null;
        }
        return $node->right === null
            ? $node
            : $this->maxNode($node->right);
    }

    /**
     *  Perform an in-order traversal of the Splay Tree.
     *
     * @param SplayTreeNode|null $node The root node to start traversing from
     * @return array Representation of the traversed nodes
     */
    public function inOrderTraversal(?SplayTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result = array_merge($result, $this->inOrderTraversal($node->left));
            $result[] = [$node->key => $node->value];
            $result = array_merge($result, $this->inOrderTraversal($node->right));
        }
        return $result;
    }
}
