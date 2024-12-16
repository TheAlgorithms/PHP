<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed)
 * in Pull Request #163: https://github.com/TheAlgorithms/PHP/pull/163
 * and #173: https://github.com/TheAlgorithms/PHP/pull/173
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../DataStructures/AVLTree/AVLTree.php';
require_once __DIR__ . '/../../DataStructures/AVLTree/AVLTreeNode.php';
require_once __DIR__ . '/../../DataStructures/AVLTree/TreeTraversal.php';

use DataStructures\AVLTree\AVLTree;
use DataStructures\AVLTree\TreeTraversal;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

class AVLTreeTest extends TestCase
{
    private AVLTree $tree;

    protected function setUp(): void
    {
        $this->tree = new AVLTree();
    }

    private function populateTree(): void
    {
        $this->tree->insert(10, 'Value 10');
        $this->tree->insert(20, 'Value 20');
        $this->tree->insert(5, 'Value 5');
        $this->tree->insert(15, 'Value 15');
    }

    /**
     * Tests the insert and search operations in the AVLTree.
     */
    public function testInsertAndSearch(): void
    {
        $this->populateTree();

        $this->assertEquals('Value 10', $this->tree->search(10), 'Value for key 10 should be "Value 10"');
        $this->assertEquals('Value 20', $this->tree->search(20), 'Value for key 20 should be "Value 20"');
        $this->assertEquals('Value 5', $this->tree->search(5), 'Value for key 5 should be "Value 5"');
        $this->assertNull($this->tree->search(25), 'Value for non-existent key 25 should be null');
    }

    /**
     * Tests the deletion of nodes and ensures the AVLTree maintains
     * its integrity after deletions.
     */
    public function testDelete(): void
    {
        $this->populateTree();

        $this->tree->delete(20);
        $this->tree->delete(5);

        $this->assertNull($this->tree->search(20), 'Value for deleted key 20 should be null');
        $this->assertNull($this->tree->search(5), 'Value for deleted key 5 should be null');

        $this->tree->delete(50);

        $this->assertNotNull($this->tree->search(10), 'Value for key 10 should still exist');
        $this->assertNotNull($this->tree->search(15), 'Value for key 15 should still exist');
        $this->assertNull($this->tree->search(50), 'Value for non-existent key 50 should be null');

        $expectedInOrderAfterDelete = [
            [10 => 'Value 10'],
            [15 => 'Value 15']
        ];

        $result = TreeTraversal::inOrder($this->tree->getRoot());
        $this->assertEquals(
            $expectedInOrderAfterDelete,
            $result,
            'In-order traversal after deletion should match expected result'
        );
    }

    public function testInOrderTraversal(): void
    {
        $this->populateTree();

        $expectedInOrder = [
            [5 => 'Value 5'],
            [10 => 'Value 10'],
            [15 => 'Value 15'],
            [20 => 'Value 20']
        ];

        $result = $this->tree->inOrderTraversal();
        $this->assertEquals($expectedInOrder, $result, 'In-order traversal should match expected result');
    }

    public function testPreOrderTraversal(): void
    {
        $this->populateTree();

        $expectedPreOrder = [
            [10 => 'Value 10'],
            [5 => 'Value 5'],
            [20 => 'Value 20'],
            [15 => 'Value 15']
        ];

        $result = $this->tree->preOrderTraversal();
        $this->assertEquals($expectedPreOrder, $result, 'Pre-order traversal should match expected result');
    }

    public function testPostOrderTraversal(): void
    {
        $this->populateTree();

        $expectedPostOrder = [
            [5 => 'Value 5'],
            [15 => 'Value 15'],
            [20 => 'Value 20'],
            [10 => 'Value 10']
        ];

        $result = TreeTraversal::postOrder($this->tree->getRoot());
        $this->assertEquals($expectedPostOrder, $result, 'Post-order traversal should match expected result');
    }

    public function testBreadthFirstTraversal(): void
    {
        $this->populateTree();

        $expectedBFT = [
            [10 => 'Value 10'],
            [5 => 'Value 5'],
            [20 => 'Value 20'],
            [15 => 'Value 15']
        ];

        $result = TreeTraversal::breadthFirst($this->tree->getRoot());
        $this->assertEquals($expectedBFT, $result, 'Breadth-first traversal should match expected result');
    }

    public function testInsertAndDeleteSingleNode(): void
    {
        $this->tree = new AVLTree();

        $this->tree->insert(1, 'One');
        $this->assertEquals('One', $this->tree->search(1), 'Value for key 1 should be "One"');
        $this->tree->delete(1);
        $this->assertNull($this->tree->search(1), 'Value for key 1 should be null after deletion');
    }

    public function testDeleteFromEmptyTree(): void
    {
        $this->tree = new AVLTree();

        $this->tree->delete(1);
        $this->assertNull($this->tree->search(1), 'Value for key 1 should be null as it was never inserted');
    }

    public function testInsertDuplicateKeys(): void
    {
        $this->tree = new AVLTree();

        $this->tree->insert(1, 'One');
        $this->tree->insert(1, 'One Updated');
        $this->assertEquals(
            'One Updated',
            $this->tree->search(1),
            'Value for key 1 should be "One Updated" after updating'
        );
    }

    /**
     * Tests the insertion and deletion of a large number of nodes.
     */
    public function testLargeTree(): void
    {
        // Inserting a large number of nodes
        for ($i = 1; $i <= 1000; $i++) {
            $this->tree->insert($i, "Value $i");
        }

        // Verify that all inserted nodes can be searched
        for ($i = 1; $i <= 1000; $i++) {
            $this->assertEquals("Value $i", $this->tree->search($i), "Value for key $i should be 'Value $i'");
        }

        // Verify that all inserted nodes can be deleted
        for ($i = 1; $i <= 5; $i++) {
            $this->tree->delete($i);
            $this->assertNull($this->tree->search($i), "Value for key $i should be null after deletion");
        }
    }

    /**
     * Tests whether the AVLTree remains balanced after insertions.
     */
    public function testBalance(): void
    {
        $this->populateTree();

        // Perform operations that may unbalance the tree
        $this->tree->insert(30, 'Value 30');
        $this->tree->insert(25, 'Value 25');

        // After insertions, check the balance
        $this->assertTrue($this->tree->isBalanced(), 'Tree should be balanced after insertions');
    }

    public function testRightRotation(): void
    {
        $this->populateTreeForRightRotation();

        // Insert a node that will trigger a right rotation
        $this->tree->insert(40, 'Value 40');

        // Verify the tree structure after rotation
        $root = $this->tree->getRoot();
        $this->assertEquals(20, $root->key, 'Root should be 20 after right rotation');
        $this->assertEquals(10, $root->left->key, 'Left child of root should be 10');
        $this->assertEquals(30, $root->right->key, 'Right child of root should be 30');
    }

    private function populateTreeForRightRotation(): void
    {
        // Insert nodes in a way that requires a right rotation
        $this->tree->insert(10, 'Value 10');
        $this->tree->insert(20, 'Value 20');
        $this->tree->insert(30, 'Value 30'); // This should trigger a right rotation around 10
    }

    public function testLeftRotation(): void
    {
        $this->populateTreeForLeftRotation();

        // Insert a node that will trigger a left rotation
        $this->tree->insert(5, 'Value 5');

        // Verify the tree structure after rotation
        $root = $this->tree->getRoot();
        $this->assertEquals(20, $root->key, 'Root should be 20 after left rotation');
        $this->assertEquals(10, $root->left->key, 'Left child of root should be 10');
        $this->assertEquals(30, $root->right->key, 'Right child of root should be 30');
    }

    private function populateTreeForLeftRotation(): void
    {
        $this->tree->insert(30, 'Value 30');
        $this->tree->insert(20, 'Value 20');
        $this->tree->insert(10, 'Value 10'); // This should trigger a left rotation around 30
    }

    /**
     * @throws ReflectionException
     */
    public function testGetMinNode(): void
    {
        $this->populateTree();

        // Using Reflection to access the private getMinNode method
        $reflection = new ReflectionClass($this->tree);
        $method = $reflection->getMethod('getMinNode');
        $method->setAccessible(true);

        $minNode = $method->invoke($this->tree, $this->tree->getRoot());

        // Verify the minimum node
        $this->assertEquals(5, $minNode->key, 'Minimum key in the tree should be 5');
        $this->assertEquals('Value 5', $minNode->value, 'Value for minimum key 5 should be "Value 5"');
    }

    public function testSizeAfterInsertions(): void
    {
        $this->tree = new AVLTree();

        $this->assertEquals(0, $this->tree->size(), 'Size should be 0 initially');

        $this->tree->insert(10, 'Value 10');
        $this->tree->insert(20, 'Value 20');
        $this->tree->insert(5, 'Value 5');

        $this->assertEquals(3, $this->tree->size(), 'Size should be 3 after 3 insertions');

        $this->tree->delete(20);

        $this->assertEquals(2, $this->tree->size(), 'Size should be 2 after deleting 1 node');
    }

    public function testSizeAfterMultipleInsertionsAndDeletions(): void
    {
        $this->tree = new AVLTree();

        // Insert nodes
        for ($i = 1; $i <= 10; $i++) {
            $this->tree->insert($i, "Value $i");
        }

        $this->assertEquals(10, $this->tree->size(), 'Size should be 10 after 10 insertions');

        for ($i = 1; $i <= 5; $i++) {
            $this->tree->delete($i);
        }

        $this->assertEquals(5, $this->tree->size(), 'Size should be 5 after deleting 5 nodes');
    }

    public function testSizeOnEmptyTree(): void
    {
        $this->tree = new AVLTree();
        $this->assertEquals(0, $this->tree->size(), 'Size should be 0 for an empty tree');
    }

    /**
     * Test serialization and deserialization
     */
    public function testAVLTreeSerialization(): void
    {
        $avlTree = new AVLTree();

        $avlTree->insert(100, 'Value 100');
        $avlTree->insert(200, 'Value 200');
        $avlTree->insert(50, 'Value 50');
        $avlTree->insert(150, 'Value 150');
        $avlTree->insert(350, 'Value 350');
        $avlTree->insert(40, 'Value 40');
        $avlTree->insert(90, 'Value 90');

        $avlTreeRoot = $avlTree->getRoot();
        $serializedAVLTree = $avlTree->serialize();

        $deserializedTree = new AVLTree();
        $deserializedTree->deserialize($serializedAVLTree);

        $deserializedTreeRoot = $deserializedTree->getRoot();

        $this->assertEquals($deserializedTreeRoot->key, $avlTreeRoot->key, 'The two roots key should match');
        $this->assertEquals($deserializedTreeRoot->value, $avlTreeRoot->value, 'The two roots value should match');
        $this->assertEquals(
            $deserializedTreeRoot->left->key,
            $avlTreeRoot->left->key,
            'Left child of the two roots should match'
        );
        $this->assertEquals(
            $deserializedTreeRoot->right->key,
            $avlTreeRoot->right->key,
            'Left child of the two roots should match'
        );
        $this->assertEquals(
            $deserializedTreeRoot->height,
            $avlTreeRoot->height,
            'The two trees should match in height'
        );
        $this->assertEquals($deserializedTree->size(), $avlTree->size(), 'The two trees should match in size');

        $this->assertSame(
            $deserializedTree->inOrderTraversal(),
            $avlTree->inOrderTraversal(),
            'Tree structure was not retained'
        );
    }
}
