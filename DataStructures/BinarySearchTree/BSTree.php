<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #174
 * https://github.com/TheAlgorithms/PHP/pull/174
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\BinarySearchTree;

require_once 'BinaryTreeTraversal.php';

class BSTree extends BinaryTreeTraversal
{
    private ?BSTNode $root = null;
    private int $counter = 0;

    /**
     * Optionally provide an array of key-value pairs to build the binary search tree from.
     * Optionally set the traversal algorithm for the Iterator interface.
     * Otherwise, with manual insert() and setTraversalType() after initialization.
     */
    public function __construct(array $initialData = [], string $traversalType = parent::IN_ORDER)
    {
        foreach ($initialData as $key => $value) {
            $this->insert($key, $value);                // Build the tree from an array of key-value pairs
        }
        parent::setTraversalType($traversalType);
    }
    /**
     * Get the root of the Splay Tree.
     *
     * @return BSTNode|NULL The root node.
     */
    public function getRoot(): ?BSTNode
    {
        return $this->root;
    }

    public function size(): int
    {
        return $this->counter;
    }

    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    /**
     * Inserts a new node into binary search tree and updates parent reference.
     *
     * Time complexity: O(log n) for binary search tree insertion.
     */
    public function insert(int $key, $value): ?BSTNode
    {
        $this->insertNode($this->root, $key, $value);
        $this->counter++;
        return $this->root;
    }

    private function insertNode(?BSTNode &$rootPtr, int $key, $value): void
    {
        if ($rootPtr === null) {
            $rootPtr = new BSTNode($key, $value);
            return;
        }

        if ($key < $rootPtr->key) {
            $this->insertNode($rootPtr->left, $key, $value);
            $rootPtr->left->parent = $rootPtr;
        } elseif ($key > $rootPtr->key) {
            $this->insertNode($rootPtr->right, $key, $value);
            $rootPtr->right->parent = $rootPtr;
        } else {
            throw new DuplicateKeyException($key);
        }
    }

    /**
     * Removes and isolates an existing node from the BST and update structure references.
     *
     * Time complexity: O(log n) for binary search tree node removal.
     */
    public function remove(int $key): ?BSTNode
    {
        $discardedNode = $this->removeNode($this->root, $key);
        if ($discardedNode !== null) {
            $this->counter--;
        }
        return $discardedNode;
    }

    private function removeNode(?BSTNode &$rootPtr, int $key): ?BSTNode
    {
        if ($rootPtr === null) {
            return null;
        }

        if ($key < $rootPtr->key) {
            $discardedNode = $this->removeNode($rootPtr->left, $key);
        } elseif ($key > $rootPtr->key) {
            $discardedNode = $this->removeNode($rootPtr->right, $key);
        } else {
            // Key found, proceed to delete
            $discardedNode = $rootPtr->getChildrenCount() === 2
                ? $this->handleNodeWithTwoChildren($rootPtr)
                : $this->handleNodeWithSingleOrZeroChild($rootPtr);
        }
        return $discardedNode;
    }

    /**
     * handle deletion when found node has 2 children.
     */
    private function handleNodeWithTwoChildren(BSTNode $rootPtr): ?BSTNode
    {
        $minRightNode = $this->minNode($rootPtr->right);

        $discarded = clone $rootPtr;

        $rootPtr->key = $minRightNode->key;
        $rootPtr->value = $minRightNode->value;

        $this->removeNode($rootPtr->right, $minRightNode->key);

        // Isolate the target node
        $discarded->left = null;
        $discarded->right = null;
        $discarded->parent = null;

        return $discarded;
    }

    /**
     * Handle deletion when found node has 1 or 0 child.
     */
    private function handleNodeWithSingleOrZeroChild(BSTNode &$rootPtr): ?BSTNode
    {
        $discard = $rootPtr;

        if ($discard->isLeaf()) {           // Case 1: Node to be removed is a leaf node
            $rootPtr = null;
        } elseif ($rootPtr->left != null) { // Case 2: Node has only a left child
            $rootPtr = $rootPtr->left;
            $discard->left = null;
        } else {                            // Case 3: Node has only a right child
            $rootPtr = $rootPtr->right;
            $discard->right = null;
        }

        // Update the parent reference for the new child node
        if ($rootPtr !== null) {
            $rootPtr->parent = $discard->parent;
        }

        // Unlink the discarded node from its parent
        $discard->parent = null;
        return $discard;
    }

    /**
     * Return the minimum node in the BST.
     */
    public function minNode(?BSTNode $node): ?BSTNode
    {
        if ($node === null) {
            return null;
        }

        return $node->left === null
            ? $node
            : $this->minNode($node->left);
    }

    /**
     * Search for a node by its key and return the node, otherwise Null.
     *
     * Time complexity: O(log n) for the splay operation.
     */
    public function search(int $key): ?BSTNode
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->searchNode($this->root, $key);
    }

    private function searchNode(?BSTNode $node, int $key): ?BSTNode
    {
        if ($node === null) {
            return null;
        }

        if ($key === $node->key) {
            return $node;
        } elseif ($key < $node->key) {
            return $this->searchNode($node->left, $key);
        } else {
            return $this->searchNode($node->right, $key);
        }
    }

    /**
     * Check if a node with the given key exists in the BST.
     *
     * Time complexity: O(log n) for the splay operation.
     *
     * @param BSTNode|null $node The root of the (sub)tree to start propagating from.
     * @param int $key The key of the node being searched.
     */
    public function isFound(?BSTNode $node, int $key): bool
    {
        if ($node === null) {
            return false;
        }

        if ($key === $node->key) {
            return true;
        } elseif ($key < $node->key) {
            return $this->isFound($node->left, $key);
        } else {
            return $this->isFound($node->right, $key);
        }
    }

    /**
     * Get the depth of the given node relative to the root of the tree.
     * Traverses from the given node up to the root of the tree by recursively following the parent references
     *
     * Time complexity: O(d_p) where d_p: depth of node p in tree
     *
     * @param BSTNode $node The node whose depth is to be calculated.
     * @return int The depth of the node relative to the root.
     */
    public function getDepth(BSTNode $node): int
    {
        return $node->parent === null
            ? 0
            : 1 + $this->getDepth($node->parent);
    }

    /**
     * Get the height of the given node relative to the farthest leaf node.
     * Recursively visits all children of the given node determining the maximum height of its subtrees
     *
     * Time Complexity: O(n)
     *
     * @param BSTNode $node The node whose height is to be calculated.
     * @return int The height of the node relative to its farthest descendant.
     */
    public function getHeight(BSTNode $node): int
    {
        if ($node->isLeaf()) {
            return 0;
        }
        $height = 0;
        $childrenList = $node->getChildren();

        foreach ($childrenList as $childNode) {
            $height = max($height, $this->getHeight($childNode));
        }
        return 1 + $height;
    }

    /**
     * Returns a flat associative array structure for inOrder Traversal
     */
    public function inOrderTraversal(): array
    {
        return $this->inOrder($this->root);
    }

    /**
     * Returns a flat associative array structure for preOrder Traversal
     */
    public function preOrderTraversal(): array
    {
        return $this->preOrder($this->root);
    }

    /**
     * Returns a flat associative array structure for postOrder Traversal
     */
    public function postOrderTraversal(): array
    {
        return $this->postOrder($this->root);
    }

    /**
     * Returns a flat associative array structure for Breadth-first Traversal
     */
    public function breadthFirstTraversal(): array
    {
        return $this->breadthFirst($this->root);
    }

    /**
     * Serializes the BST into a JSON string.
     *
     * @return string The BST as a JSON string.
     */
    public function serialize(): string
    {
        return json_encode($this->serializeTree($this->root));
    }

    /**
     * Recursively serializes the Binary Search Tree.
     *
     * @param BSTNode|null $node The current node to serialize from.
     * @return array The serialized representation of the node.
     */
    private function serializeTree(?BSTNode $node): array
    {
        if ($node === null) {
            return [];
        }
        return [
            'key' => $node->key,
            'value' => $node->value,
            'left' => $this->serializeTree($node->left),
            'right' => $this->serializeTree($node->right),
        ];
    }

    /**
     * Deserializes a JSON string into a BST object.
     *
     * @param string $data The JSON string to deserialize.
     * @return BSTree The deserialized Binary Search Tree.
     */
    public function deserialize(string $data): BSTree
    {
        $arrayRepresentation = json_decode($data, true);

        $binarySearchTree = new self();
        $binarySearchTree->root = $binarySearchTree->deserializeTree($arrayRepresentation, null);

        $binarySearchTree->updateNodeCount($binarySearchTree->root);
        return $binarySearchTree;
    }

    /**
     * Recursively deserializes a BST from an array representation.
     *
     * @param array $data The serialized data for the node.
     * @return BSTNode|null The deserialized node.
     */
    private function deserializeTree(array $data, ?BSTNode $parent): ?BSTNode
    {
        if (empty($data)) {
            return null;
        }

        $node = new BSTNode($data['key'], $data['value']);
        $node->parent = $parent;

        $node->left = $this->deserializeTree($data['left'], $node);
        $node->right = $this->deserializeTree($data['right'], $node);

        return $node;
    }
    /**
     * Recursively updates the BST size after deserialization.
     */
    private function updateNodeCount(?BSTNode $node): void
    {
        if ($node !== null) {
            $this->counter++;
            $this->updateNodeCount($node->left);
            $this->updateNodeCount($node->right);
        }
    }
}
