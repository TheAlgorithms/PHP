<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed)
 * in Pull Request #168: https://github.com/TheAlgorithms/PHP/pull/168
 * and #171: https://github.com/TheAlgorithms/PHP/pull/171
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/SplayTree/SplayTree.php';
require_once __DIR__ . '/../../DataStructures/SplayTree/SplayTreeNode.php';

use DataStructures\SplayTree\SplayTree;
use LogicException;
use PHPUnit\Framework\TestCase;

class SplayTreeTest extends TestCase
{
    private SplayTree $tree;

    protected function setUp(): void
    {
        $this->tree = new SplayTree();
    }

    private function populateTree(): void
    {
        $this->tree->insert(20, "Value 20");
        $this->tree->insert(15, "Value 15");
        $this->tree->insert(17, "Value 17");
        $this->tree->insert(25, "Value 25");
        $this->tree->insert(30, "Value 30");
        $this->tree->insert(36, "Value 36");
        $this->tree->insert(23, "Value 23");
        $this->tree->insert(24, "Value 24");
        $this->tree->insert(22, "Value 22");
        $this->tree->insert(5, "Value 5");
    }

    public function testTreeInitialization()
    {
        $tree = new SplayTree();

        $this->assertNull($tree->getRoot(), "Tree root should be null upon initialization.");
        $this->assertEquals(0, $tree->size(), "Tree size should be 0 upon initialization.");
        $this->assertTrue($tree->isEmpty(), "Tree should be empty upon initialization.");
    }

    /**
     * Checks if the root node is correctly set after one insertion.
     */
    public function testInsertSingleElement()
    {
        $this->tree->insert(10, "Value 10");
        $root = $this->tree->getRoot();

        $this->assertFalse($this->tree->isEmpty(), "Tree cannot be empty. Insertion failed.");
        $this->assertNotNull($root, "Tree has one node and its root cannot be Null");

        $this->assertEquals(10, $root->key, "The key must match the key of the inserted node");
        $this->assertEquals("Value 10", $root->value, "The value must match the value of the inserted node");

        $this->assertTrue($root->isRoot(), "Tree root must not have a parent");
        $this->assertTrue($root->isLeaf(), "Root node has no children yet");
    }

    /**
     * Inserts multiple nodes and checks if the last inserted node is splayed to the root.
     */
    public function testInsertMultiple()
    {
        $this->populateTree();

        $root = $this->tree->getRoot();

        $this->assertFalse($this->tree->isEmpty(), "Tree was not populated correctly");
        $this->assertSame(10, $this->tree->size(), "Failed to insert all 10 nodes");

        $this->assertEquals(5, $root->key, "After splay, the last inserted node should be the new root.");
        $this->assertEquals("Value 5", $root->value, "The value of the new root must match the last inserted node");

        $this->assertTrue($root->isRoot(), "The last inserted node has no longer a parent. Failed to splay correctly.");
        $this->assertFalse($root->isLeaf(), "The last inserted node is no longer a leaf. Failed to splay correctly.");
    }

    /**
     * Inserts multiple nodes from an associative array and checks if the last inserted node is splayed to the root.
     */
    public function testInsertMultipleFromArray()
    {
        $arrayData = [200 => "Value 200", 150 => "Value 150", 170 => "Value 170",
            250 => "Value 250", 300 => "Value 300", 360 => "Value 360", 230 => "Value 230",
            240 => "Value 240", 220 => "Value 220", 50 => "Value 50"
        ];

        $splayTree = new SplayTree($arrayData);
        $root = $splayTree->getRoot();

        $this->assertFalse($splayTree->isEmpty(), "Tree was not populated correctly");
        $this->assertSame(
            count($arrayData),
            $splayTree->size(),
            "Failed to insert all " . count($arrayData) . " nodes"
        );

        $this->assertEquals(50, $root->key, "After splay, the new root should be the last inserted node");
        $this->assertEquals("Value 50", $root->value, "The value of the new root must match the last inserted node");

        $this->assertTrue($root->isRoot(), "The last inserted node has no longer a parent. Failed to splay correctly.");
        $this->assertFalse($root->isLeaf(), "The last inserted node is no longer a leaf. Failed to splay correctly.");
    }

    /**
     * Checks the empty state of the tree before and after insertions.
     */
    public function testIsEmpty()
    {
        $this->assertTrue($this->tree->isEmpty(), "Tree should be empty.");
        $this->tree->insert(120, "Value 120");
        $this->assertFalse($this->tree->isEmpty(), "Tree should not be empty.");
    }

    /**
     * Data provider for splay insertion and inOrder traversal test.
     * Provides different sets of insertions and expected results.
     * Format: [nodesInserted, InOrderNodeKeys, rootNodeKey]
     */
    public static function splayInsertionDataProvider(): array
    {
        return [
            // Test case 1: Insert 20
            [
                'insertions' => [20 => "Value 20"],
                'expectedInOrderKeys' => [20],
                'expectedRootKey' => 20,
            ],
            // Test case 2: Insert 20, 15
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15"],
                'expectedInOrderKeys' => [15, 20],
                'expectedRootKey' => 15,
            ],
            // Test case 3: Insert 20, 15, 17
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17"],
                'expectedInOrderKeys' => [15, 17, 20],
                'expectedRootKey' => 17,
            ],
            // Test case 25: Insert 20, 15, 17, 25
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25"],
                'expectedInOrderKeys' => [15, 17, 20, 25],
                'expectedRootKey' => 25,
            ],
            // Test case 30: Insert 20, 15, 17, 25, 30
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25",
                    30 => "Value 30"],
                'expectedInOrderKeys' => [15, 17, 20, 25, 30],
                'expectedRootKey' => 30,
            ],
            // Test case 36: Insert 20, 15, 17, 25, 30, 36
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25",
                    30 => "Value 30", 36 => "Value 36"],
                'expectedInOrderKeys' => [15, 17, 20, 25, 30, 36],
                'expectedRootKey' => 36,
            ],
            // Test case 23: Insert 20, 15, 17, 25, 30, 36, 23
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25",
                    30 => "Value 30", 36 => "Value 36", 23 => "Value 23"],
                'expectedInOrderKeys' => [15, 17, 20, 23, 25, 30, 36],
                'expectedRootKey' => 23,
            ],
            // Test case 24: Insert 20, 15, 17, 25, 30, 36, 23, 24
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25",
                    30 => "Value 30", 36 => "Value 36", 23 => "Value 23", 24 => "Value 24"],
                'expectedInOrderKeys' => [15, 17, 20, 23, 24, 25, 30, 36],
                'expectedRootKey' => 24,
            ],
            // Test case 22: Insert 20, 15, 17, 25, 30, 36, 23, 24, 22
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25",
                    30 => "Value 30", 36 => "Value 36", 23 => "Value 23", 24 => "Value 24", 22 => "Value 22"],
                'expectedInOrderKeys' => [15, 17, 20, 22, 23, 24, 25, 30, 36],
                'expectedRootKey' => 22,
            ],
            // Test case 5: Insert 20, 15, 17, 25, 30, 36, 23, 24, 22, 5
            [
                'insertions' => [20 => "Value 20", 15 => "Value 15", 17 => "Value 17", 25 => "Value 25", 30 =>
                    "Value 30", 36 => "Value 36", 23 => "Value 23", 24 => "Value 24", 22 => "Value 22", 5 => "Value 5"],
                'expectedInOrderKeys' => [5, 15, 17, 20, 22, 23, 24, 25, 30, 36],
                'expectedRootKey' => 5,
            ],
        ];
    }

    /**
     * Test tree structure with inOrder Traversal after insertion and splaying nodes.
     * @dataProvider splayInsertionDataProvider
     */
    public function testSplayWithInOderTraversal($insertions, $expectedInOrderKeys, $expectedRootKey): void
    {
        $tree = new SplayTree();

        // Insert nodes and splay
        foreach ($insertions as $key => $value) {
            $tree->insert($key, $value);
        }

        // Traverse the tree structure wit inOrder Traversal
        $inOrderArray = $tree->inOrderTraversal($tree->getRoot());
        $inOrderArrayKeys = $this->getInOrderKeys($inOrderArray);

        // Assert the in-order traversal keys match the expected keys for every dataProvider case
        $this->assertEquals(
            $expectedInOrderKeys,
            $inOrderArrayKeys,
            'Tree structure after splay is not correct. The in-order traversal is not correct.'
        );

        // Assert the root key matches the expected root after the last insertion for every dataProvider case
        $this->assertTrue(
            $tree->getRoot()->key === $inOrderArrayKeys[array_search($expectedRootKey, $expectedInOrderKeys)],
            "Node was not splayed to root successfully"
        );
        // Assert the new root is correctly set
        $this->assertTrue($tree->getRoot()->isRoot(), "Node with key $expectedRootKey should be the new tree root");
    }

    /**
     *  Helper function to extract keys from the in-order traversal array.
     */
    private function getInOrderKeys(array $inOrderArray): array
    {
        $inOrderArrayKeys = [];
        foreach ($inOrderArray as $node) {
            $inOrderArrayKeys = array_merge($inOrderArrayKeys, array_keys($node));
        }
        return $inOrderArrayKeys;
    }

    // ------------- Test Operations on Splay Tree  -------------

    /**
     * Verifies that searching for an existing key returns the correct node
     * and ensures that it is splayed to the root.
     */
    public function testSearchExistingKey()
    {
        $this->populateTree();

        $node = $this->tree->search(22);

        $this->assertNotNull($node, "Returned node cannot be Null.");
        $this->assertNull($node->parent, "The searched node must have become the new root which has no parent");
        $this->assertTrue(
            $node->isRoot(),
            "The searched node must have become the new root. Failed to splay it correctly."
        );

        $this->assertEquals(22, $node->key, "Node with key 22 should be returned. Got a non-expected key: $node->key");
        $this->assertEquals(
            "Value 22",
            $node->value,
            "Value of Node with key 22 does not match. Got a non-expected value: $node->value"
        );
    }

    /**
     * Verifies that checking for an existing key returns true
     * and ensures that its node is splayed to the root.
     */
    public function testIsFoundExistingKey()
    {
        $this->populateTree();

        $isFound = $this->tree->isFound(25);
        $node = $this->tree->getRoot();

        $this->assertTrue($isFound, "Node with key 25 exists.");
        $this->assertEquals(25, $node->key, "Node with key 25 should be returned. Got a non-expected key: $node->key");

        $this->assertTrue(
            $node->isRoot(),
            "The searched node must have become the new root. Failed to splay it correctly."
        );
    }

    /**
     * Ensures that searching for a non-existing key returns the last visit node
     * and ensures that it is splayed to the root.
     */
    public function testSearchNonExistingKey()
    {
        $this->populateTree();

        $node = $this->tree->search(250);   // Search for a non-existing key

        $this->assertNotNull($node, "Returned node cannot be Null.");
        $this->assertEquals(
            36,
            $node->key,
            "Node key: 36 should be returned. Got a Non-expected key: $node->key
            . Failed to splay the last visited node."
        );

        $this->assertEquals(
            "Value 36",
            $node->value,
            "Value of node 36 does not match. Got a Non-expected value: $node->value"
        );

        $this->assertNull(
            $node->parent,
            "The last visited node must have become the new root which has no parent. Failed to splay correctly."
        );
    }

    /**
     * Verifies that checking for a non-existing key returns false
     * and ensures that the last visited node is splayed to the root.
     */
    public function testIsFoundNonExistingKey()
    {
        $this->populateTree();

        $isFound = $this->tree->isFound(18);
        $node = $this->tree->getRoot();

        $this->assertFalse($isFound, "Node with key 18 does not exist.");
        $this->assertEquals(
            17,
            $node->key,
            "Node key: 17 should be returned. Got a Non-expected key: $node->key
            . Failed to splay the last visited node."
        );
        $this->assertTrue(
            $node->isRoot(),
            "The last visited node must have become the new root. Failed to splay it correctly."
        );
    }

    /**
     * Tests the update functionality on an existing key and ensures its node is splayed to the root.
     */
    public function testUpdateExistingKey()
    {
        $this->populateTree();

        $this->tree->update(36, 360);

        $node = $this->tree->search(36);

        $this->assertNotNull($node, "Node with key 36 should exist after update.");
        $this->assertEquals(360, $node->value, "Node with key 36 should have the updated value.");
        $this->assertEquals(36, $node->key, "Node with key 36 should be returned. Got a non-expected key: $node->key");
        $this->assertTrue(
            $node->isRoot(),
            "The updated node must have become the new root. Failed to splay it correctly."
        );
    }

    /**
     * Checks that updating a non-existing key splays the last visited node only.
     */
    public function testUpdateNonExistingKey()
    {
        $this->populateTree();

        $node = $this->tree->update(60, "Value 60");    // Update a non-existing key

        $this->assertNotNull($node, "Returned node cannot be Null");
        $this->assertEquals(
            36,
            $node->key,
            "Node key: 36 should be returned. Got a Non-expected key: $node->key
            . Failed to splay the last visited node."
        );
        $this->assertEquals(
            "Value 36",
            $node->value,
            "Value of node 36 does not match. Got a Non-expected value: $node->value"
        );
        $this->assertNull(
            $node->parent,
            "The last visited node must have become the new root which has no parent. Failed to splay correctly."
        );
    }

    /**
     * Tests deletion of a node and checks if the correct new root is set after merging the two subtrees.
     */
    public function testDeleteExistingKey()
    {
        $this->populateTree();

        $nodesNumber = $this->tree->size();
        $node = $this->tree->delete(22);

        $isFound = $this->tree->isFound(22);
        $this->assertFalse($isFound, "Node with key 22 was not deleted.");

        $this->assertEquals(
            $nodesNumber - 1,
            $this->tree->size(),
            "After deletion, total nodes count was not updated correctly."
        );

        $this->assertEquals(
            20,
            $node->key,
            "After deleting 22, the new root should be the node with key 20."
        );
    }

    /**
     * Tests correct subtree merging after deletion of a splayed node to the root.
     */
    public function testMergeAfterDeleteExistingKey()
    {
        $this->populateTree();

        $node = $this->tree->delete(20);

        $inOrderTraversalNodes = $this->tree->inOrderTraversal($this->tree->getRoot());
        $inOrderArrayKeys = $this->getInOrderKeys($inOrderTraversalNodes);

        $expectedInOrderKeys = [5, 15, 17, 22, 23, 24, 25, 30, 36];

        $this->assertEquals(
            17,
            $node->key === $inOrderArrayKeys[array_search($node->key, $expectedInOrderKeys)],
            "After deleting 20, the new root should be the node with key 17."
        );

        // Assert the in-order traversal keys match the expected keys
        $this->assertEquals(
            $expectedInOrderKeys,
            $inOrderArrayKeys,
            'Tree structure after splay is not correct. 
            The in-order traversal is not correct. Failed to merge subtrees.'
        );
    }

    /**
     * Tests deletion of multiple nodes and checks if the tree size is updated.
     */
    public function testDeleteMultipleKeys()
    {
        $arrayData = [200 => "Value 200", 150 => "Value 150", 170 => "Value 170",
            250 => "Value 250", 300 => "Value 300", 360 => "Value 360", 230 => "Value 230",
            240 => "Value 240", 220 => "Value 220", 50 => "Value 50", 28 => "Value 28",
            164 => "Value 164", 321 => "Value 321", 40 => "Value 40"
        ];

        $splayTree = new SplayTree($arrayData);
        $treeSize = $splayTree->size();

        // pick randomly some nodes to delete
        $randomNodesToDelete = array_rand($arrayData, rand(1, count($arrayData)));

        $randomNodesToDelete = is_array($randomNodesToDelete)
            ? $randomNodesToDelete
            : [$randomNodesToDelete];

        $expectedSize = $treeSize - count($randomNodesToDelete);

        foreach ($randomNodesToDelete as $key) {
            $isFound = $splayTree->isFound($key);   // splay the key to the root before deletion
            $this->assertTrue($isFound, "Node with key $key is not present for deletion.");

            $rootKey = $splayTree->getRoot()->key;
            $this->assertEquals($rootKey, $key, "Target key was not splayed to root correctly.");

            $splayTree->delete($splayTree->getRoot()->key);
        }

        $this->assertEquals(
            $expectedSize,
            $splayTree->size(),
            "After deletion, total nodes count was not updated correctly."
        );
    }

    /**
     * Ensures that attempting to delete a non-existing key throws an exception and keeps the tree intact.
     */
    public function testDeleteNonExistingKey()
    {
        $this->populateTree();

        $root = $this->tree->getRoot();

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Key: 90 not found in tree. Splayed the last visited node.");

        $this->tree->delete(90);    // Delete a non-existing key
        $this->assertEquals(5, $root->key, "The tree root should not have been changed.");
    }

    /**
     * Tests update, search, size, isFound and delete operations on an empty tree.
     */
    public function testOperationsOnEmptyTree()
    {
        $this->assertEquals(0, $this->tree->size(), "Tree should be empty.");

        $rootNode1 = $this->tree->search(100);
        $this->assertNull($rootNode1, "Searching for a key in an empty tree should return null.");

        $rootNode2 = $this->tree->isFound(200);
        $this->assertFalse($rootNode2, "Searching for a key in an empty tree should return null.");

        $rootNode3 = $this->tree->update(100, "Value 100");
        $this->assertNull($rootNode3, "Updating a key in an empty tree should return null.");

        $this->expectException(LogicException::class);
        $rootNode4 = $this->tree->delete(100);
        $this->assertNull($rootNode4, "Deleting a key in an empty tree should return null.");
    }


    // ------------- Test 6 Rotation types of the Splay Tree  -------------

    /**
     * Verify the structure after the Zig rotation
     */
    public function testZigRotation(): void
    {
        $tree = new SplayTree();
        $this->populateTree();

        $tree->insert(20, 'A');
        $tree->insert(10, 'B');  // Trigger a Zig rotation when 10 is splayed

        $root = $tree->getRoot();
        $this->assertSame(10, $root->key, 'Root should be 10 after Zig rotation');
        $this->assertNull($root->parent, "Root parent is Null after Zig rotation");
        $this->assertSame(20, $root->right->key, '20 should be the right child of 10 after Zig rotation');
    }

    /**
     * Verify the structure after the Zag rotation
     */
    public function testZagRotation(): void
    {
        $tree = new SplayTree();

        $tree->insert(10, 'A');
        $tree->insert(20, 'B');  // Trigger a Zag rotation when 20 is splayed

        $root = $tree->getRoot();
        $this->assertSame(20, $root->key, 'Root should be 20 after Zag rotation');
        $this->assertNull($root->parent, "Root parent is Null after Zig rotation");
        $this->assertSame(10, $root->left->key, '10 should be the left child of 20 after Zag rotation');
    }

    /**
     * Verify the structure after the Zig-Zig rotation
     */
    public function testZigZigRotation(): void
    {
        $tree = new SplayTree();

        $tree->insert(30, 'A');
        $tree->insert(20, 'B');
        $tree->insert(10, 'C');  // Trigger a Zig-Zig rotation when 10 is splayed

        $root = $tree->getRoot();
        $this->assertSame(10, $root->key, 'Root should be 10 after Zig-Zig rotation');
        $this->assertTrue($root->isRoot(), "Root parent should be Null after Zig-Zig rotation");
        $this->assertSame(20, $root->right->key, '20 should be the right child of 10 after Zig-Zig rotation');
        $this->assertSame(30, $root->right->right->key, '30 should be the right child of 20 after Zig-Zig rotation');
    }

    /**
     * Verify the structure after the Zag-Zag rotation
     */
    public function testZagZagRotation(): void
    {
        $tree = new SplayTree();

        $tree->insert(10, 'A');
        $tree->insert(20, 'B');
        $tree->insert(30, 'C');  // Trigger a Zag-Zag rotation when 30 is splayed

        $root = $tree->getRoot();
        $this->assertSame(30, $root->key, 'Root should be 30 after Zag-Zag rotation');
        $this->assertTrue($root->isRoot(), "Root parent should be Null after Zag-Zag rotation");
        $this->assertSame(20, $root->left->key, '20 should be the left child of 30 after Zag-Zag rotation');
        $this->assertSame(10, $root->left->left->key, '10 should be the left child of 20 after Zag-Zag rotation');
    }

    /**
     * Verify the structure after the Zig-Zag rotation
     */
    public function testZigZagRotation(): void
    {
        $tree = new SplayTree();

        $tree->insert(30, 'A');
        $tree->insert(10, 'B');
        $tree->insert(20, 'C');  // Trigger Zig-Zag rotation when 20 is splayed

        $root = $tree->getRoot();
        $this->assertSame(20, $root->key, 'Root should be 20 after Zig-Zag rotation');
        $this->assertTrue($root->isRoot(), "Root parent should be Null after Zig-Zag rotation");
        $this->assertSame(10, $root->left->key, '10 should be the left child of 20 after Zig-Zag rotation');
        $this->assertSame(30, $root->right->key, '30 should be the right child of 20 after Zig-Zag rotation');
    }

    /**
     * Verify the structure after the Zag-Zig rotation
     */
    public function testZagZigRotation(): void
    {
        $tree = new SplayTree();

        $tree->insert(10, 'A');
        $tree->insert(30, 'B');
        $tree->insert(20, 'C');  // Trigger a Zag-Zig rotation when 20 is splayed

        $root = $tree->getRoot();
        $this->assertSame(20, $root->key, 'Root should be 20 after Zag-Zig rotation');
        $this->assertTrue($root->isRoot(), "Root parent should be Null after Zag-Zag rotation");
        $this->assertSame(10, $root->left->key, '10 should be the left child of 20 after Zag-Zig rotation');
        $this->assertSame(30, $root->right->key, '30 should be the right child of 20 after Zag-Zig rotation');
    }
}
