<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #174
 * https://github.com/TheAlgorithms/PHP/pull/174
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/BinarySearchTree/BSTree.php';
require_once __DIR__ . '/../../DataStructures/BinarySearchTree/BSTNode.php';
require_once __DIR__ . '/../../DataStructures/BinarySearchTree/DuplicateKeyException.php';

use DataStructures\BinarySearchTree\BSTree;
use DataStructures\BinarySearchTree\DuplicateKeyException;
use PHPUnit\Framework\TestCase;

class BSTreeTest extends TestCase
{
    private BSTree $tree;


    protected function setUp(): void
    {
        // Initialize an empty tree before each test
        $this->tree = new BSTree();
    }

    public function testTreeInitialization()
    {
        $tree = new BSTree();

        $this->assertNull($tree->getRoot(), "Tree root should be null upon initialization.");
        $this->assertEquals(0, $tree->size(), "Tree size should be 0 upon initialization.");
        $this->assertTrue($tree->isEmpty(), "Tree should be empty upon initialization.");
    }

    /**
     * Test: Insert a single node
     */
    public function testInsertSingleNode(): void
    {
        $this->tree->insert(10, 'value10');
        $this->assertNotNull($this->tree->getRoot());
        $this->assertEquals(10, $this->tree->getRoot()->key);
        $this->assertEquals('value10', $this->tree->getRoot()->value);
    }

    /**
     * Test: Insert multiple nodes and validate structure
     */
    public function testInsertMultipleNodes(): void
    {
        $this->tree->insert(20, 'value20');
        $this->tree->insert(10, 'value10');
        $this->tree->insert(30, 'value30');

        // Check root and children
        $this->assertEquals(20, $this->tree->getRoot()->key);
        $this->assertEquals(10, $this->tree->getRoot()->left->key);
        $this->assertEquals(30, $this->tree->getRoot()->right->key);
    }

    /**
     * Test: Insert multiple nodes from array and validate structure
     *
     */
    public function testInsertMultipleNodesFromArray()
    {
        $arrayData = [200 => "Value 200", 150 => "Value 150", 170 => "Value 170",
            250 => "Value 250", 300 => "Value 300", 360 => "Value 360", 230 => "Value 230",
            240 => "Value 240", 220 => "Value 220", 50 => "Value 50", 28 => "Value 28", 164 => "Value 164",
            321 => "Value 321", 40 => "Value 40", 9 => "Value 9", 32 => "Value 32", 64 => "Value 64",
        ];

        $bsTree = new BSTree($arrayData);
        $root = $bsTree->getRoot();

        $this->assertFalse($bsTree->isEmpty(), "Tree was not populated correctly");
        $this->assertSame(count($arrayData), $bsTree->size(), "Failed to insert all " . count($arrayData) . " nodes");

        $this->assertEquals(200, $root->key, "The root should be the first inserted node");
        $this->assertEquals("Value 200", $root->value, "The value of the new root must match the first inserted node");
    }

    /**
     * Test: Duplicate key insertion should throw an exception
     */
    public function testInsertDuplicateKey(): void
    {
        $this->tree->insert(15, 'value15');
        $this->expectException(DuplicateKeyException::class);
        $this->tree->insert(15, 'valueNew');
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

    private function populateTree(): void
    {
        $this->tree->insert(200, "Value 200");
        $this->tree->insert(150, "Value 150");
        $this->tree->insert(250, "Value 250");
        $this->tree->insert(170, "Value 170");
        $this->tree->insert(140, "Value 140");
        $this->tree->insert(130, "Value 130");
        $this->tree->insert(110, "Value 110");
        $this->tree->insert(115, "Value 115");
        $this->tree->insert(160, "Value 160");
        $this->tree->insert(180, "Value 180");
        $this->tree->insert(185, "Value 185");
        $this->tree->insert(220, "Value 220");
        $this->tree->insert(230, "Value 230");
        $this->tree->insert(300, "Value 300");
        $this->tree->insert(360, "Value 360");
        $this->tree->insert(215, "Value 215");
        $this->tree->insert(240, "Value 240");
        $this->tree->insert(225, "Value 225");
        $this->tree->insert(50, "Value 50");
        $this->tree->insert(70, "Value 70");
    }

    /**
     * Test: Search for an existing node
     */
    public function testSearchNodeExists(): void
    {
        $this->populateTree();
        $node = $this->tree->search(115);
        $isFound = $this->tree->isFound($this->tree->getRoot(), 230);

        $this->assertNotNull($node, "The node with key 115 exists. Should not be null.");
        $this->assertEquals(115, $node->key, "The node key does not match");
        $this->assertEquals('Value 115', $node->value, "The node value does not match");
        $this->assertTrue($isFound, "Node with key 230 exists.");
    }

    /**
     * Test: Search for a non-existing node
     */
    public function testSearchNodeNotExists(): void
    {
        $this->populateTree();

        $node = $this->tree->search(444);
        $isFound = $this->tree->isFound($this->tree->getRoot(), 1500);

        $this->assertNull($node, "Node with key 40 does not exist");
        $this->assertFalse($isFound, "Node with key 1500  does not exist.");
    }

    /**
     * Test: Remove a leaf node
     */
    public function testRemoveLeafNode(): void
    {
        $this->populateTree();

        $this->assertTrue($this->tree->search(360)->isLeaf(), "The node with key 360 is leaf.");
        $parentNode = $this->tree->search(360)->parent->key;    // 300

        $removedNode = $this->tree->remove(360);
        $this->assertNull($this->tree->search(360), "Node with key 360 should be gone");
        $this->assertNotNull(
            $this->tree->search($parentNode),
            "Parent node with key 300 should still exist. Tree was not merged correctly."
        );

        $this->assertEquals(360, $removedNode->key, "The key of the removed node does not match");
        $this->assertEquals('Value 360', $removedNode->value, "The value of the removed node does not match");
        $this->assertNull(
            $removedNode->left,
            "The left pointer was not broken from tree correctly. Node isolation failed."
        );
        $this->assertNull(
            $removedNode->right,
            "The right pointer was not broken from tree correctly. Node isolation failed."
        );
        $this->assertNull(
            $removedNode->parent,
            "The parent pointer was not broken from tree correctly. Node isolation failed."
        );
    }

    /**
     * Test: Remove a node with one child
     */
    public function testRemoveNodeWithOneChild(): void
    {
        $this->populateTree();

        $this->assertEquals(1, $this->tree->search(140)->getChildrenCount(), "The node with key 140 has one child.");
        $parentNode = $this->tree->search(140)->parent->key;    // 150
        $leftNode = $this->tree->search(140)->left->key;    // 130

        $removedNode = $this->tree->remove(140);
        $this->assertNull($this->tree->search(140), "Node with key 140 should be gone");
        $this->assertNotNull(
            $this->tree->search($parentNode),
            "Parent node with key 150 should still exist. Tree was not merged correctly."
        );
        $this->assertNotNull(
            $this->tree->search($leftNode),
            "Left Node with key 130 should still exist. Tree was not merged correctly."
        );

        $this->assertEquals(140, $removedNode->key, "The key of the removed node does not match");
        $this->assertEquals('Value 140', $removedNode->value, "The value of the removed node does not match");
        $this->assertNull(
            $removedNode->left,
            "The left pointer was not broken from tree correctly. Node isolation failed."
        );
        $this->assertNull(
            $removedNode->right,
            "The right pointer was not broken from tree correctly. Node isolation failed."
        );
        $this->assertNull(
            $removedNode->parent,
            "The parent pointer was not broken from tree correctly. Node isolation failed."
        );
    }

    /**
     * Test: Remove a node with two children
     */
    public function testRemoveNodeWithTwoChildren(): void
    {
        $this->populateTree();

        $this->assertEquals(2, $this->tree->search(230)->getChildrenCount(), "The node with key 230 has two children.");

        $parentNode = $this->tree->search(230)->parent->key;    // 220
        $leftNode = $this->tree->search(230)->left->key;     // 225
        $rightNode = $this->tree->search(230)->right->key;   // 240

        $removedNode = $this->tree->remove(230);
        $this->assertNull($this->tree->search(230), "Node with key 230 should be gone");
        $this->assertNotNull(
            $this->tree->search($parentNode),
            "Parent Node with key 220 should still exist. Tree was not merged correctly."
        );
        $this->assertNotNull(
            $this->tree->search($leftNode),
            "Left Node with key 225 should still exist. Tree was not merged correctly."
        );
        $this->assertNotNull(
            $this->tree->search($rightNode),
            "Parent Node with key 240 should still exist. Tree was not merged correctly."
        );

        $this->assertEquals(230, $removedNode->key, "The key of the removed node does not match");
        $this->assertEquals('Value 230', $removedNode->value, "The value of the removed node does not match");
        $this->assertNull(
            $removedNode->left,
            "The left pointer was not broken from tree correctly. Node isolation failed."
        );
        $this->assertNull(
            $removedNode->right,
            "The right pointer was not broken from tree correctly. Node isolation failed."
        );
        $this->assertNull(
            $removedNode->parent,
            "The parent pointer was not broken from tree correctly. Node isolation failed."
        );
    }

    public function testRemoveNonExistingNode(): void
    {
        $this->populateTree();
        $removedNode = $this->tree->remove(3333);
        $this->assertNull($removedNode, "Node not found, Null should be returned.");
    }

    /**
     * Test: Check tree size
     */
    public function testTreeSize(): void
    {
        $this->assertEquals(0, $this->tree->size());

        $arrayData = [200 => "Value 200", 150 => "Value 150", 170 => "Value 170",
            250 => "Value 250", 300 => "Value 300", 360 => "Value 360", 230 => "Value 230",
            240 => "Value 240", 220 => "Value 220", 50 => "Value 50", 28 => "Value 28",
            164 => "Value 164", 321 => "Value 321", 40 => "Value 40", 9 => "Value 9",
            32 => "Value 32", 64 => "Value 64", 116 => "Value 116"
        ];

        $bsTree = new BSTree($arrayData);
        $this->assertEquals(
            count($arrayData),
            $bsTree->size(),
            "Tree size should be size of array. Failed to insert all nodes."
        );
    }

    /**
     * Test depth for various nodes
     */
    public function testGetDepth(): void
    {
        $this->populateTree();

        $root = $this->tree->getRoot();

        $node150 = $this->tree->search(150);
        $node110 = $this->tree->search(110);
        $node70 = $this->tree->search(70);

        $this->assertEquals(0, $this->tree->getdepth($root), "The root node should have a depth of 0.");
        $this->assertEquals(1, $this->tree->getdepth($node150), "Node 150 should have a depth of 1.");
        $this->assertEquals(4, $this->tree->getdepth($node110), "Node 110 should have a depth of 4.");
        $this->assertEquals(6, $this->tree->getdepth($node70), "Node 300 should have a depth of 6.");
    }

    /**
     * Test height for various nodes
     */
    public function testGetHeight(): void
    {
        $this->populateTree();

        $root = $this->tree->getRoot();

        $node150 = $this->tree->search(150);
        $node110 = $this->tree->search(110);
        $node70 = $this->tree->search(70);
        $node360 = $this->tree->search(360);

        $this->assertEquals(6, $this->tree->getheight($root), "The root node should have a height of 6.");
        $this->assertEquals(5, $this->tree->getheight($node150), "Node 150 should have a height of 5.");
        $this->assertEquals(0, $this->tree->getheight($node70), "Node 70 should have a height of 0 (it's a leaf).");
        $this->assertEquals(0, $this->tree->getheight($node360), "Node 360 should have a height of 0 (it's a leaf).");
        $this->assertEquals(2, $this->tree->getheight($node110), "Node 110 should have a height of 2.");
    }

    /**
     * Test: In-order traversal
     */
    public function testInOrderTraversal(): void
    {
        $this->assertSame(
            $this->getExpectedInOrder(),
            $this->tree->inOrderTraversal(),
            "Did not match the expected inOrder nodes. Failed inOrder traversal."
        );
    }

    private function getExpectedInOrder(): array
    {
        $this->populateTree();

        return [
            50 => 'Value 50', 70 => 'Value 70', 110 => 'Value 110',
            115 => 'Value 115', 130 => 'Value 130', 140 => 'Value 140',
            150 => 'Value 150', 160 => 'Value 160', 170 => 'Value 170',
            180 => 'Value 180', 185 => 'Value 185', 200 => 'Value 200', 215 => 'Value 215',
            220 => 'Value 220', 225 => 'Value 225', 230 => 'Value 230', 240 => 'Value 240',
            250 => 'Value 250', 300 => 'Value 300', 360 => 'Value 360'
        ];
    }

    /**
     * Test: Pre-order traversal
     */
    public function testPreOrderTraversal(): void
    {
        $this->assertSame(
            $this->getExpectedPreOrder(),
            $this->tree->preOrderTraversal(),
            "Did not match the expected preOrder nodes. Failed preOrder traversal."
        );
    }

    private function getExpectedPreOrder(): array
    {
        $this->populateTree();

        return [
            200 => 'Value 200', 150 => 'Value 150', 140 => 'Value 140',
            130 => 'Value 130', 110 => 'Value 110', 50 => 'Value 50',
            70 => 'Value 70', 115 => 'Value 115', 170 => 'Value 170',
            160 => 'Value 160', 180 => 'Value 180', 185 => 'Value 185', 250 => 'Value 250',
            220 => 'Value 220', 215 => 'Value 215', 230 => 'Value 230', 225 => 'Value 225',
            240 => 'Value 240', 300 => 'Value 300', 360 => 'Value 360'
        ];
    }

    /**
     * Test: Post-order traversal
     */
    public function testPostOrderTraversal(): void
    {
        $this->assertSame(
            $this->getExpectedPostOrder(),
            $this->tree->postOrderTraversal(),
            "Did not match the expected postOrder nodes. Failed postOrder traversal."
        );
    }

    private function getExpectedPostOrder(): array
    {
        $this->populateTree();

        return [
            70 => 'Value 70', 50 => 'Value 50', 115 => 'Value 115',
            110 => 'Value 110', 130 => 'Value 130', 140 => 'Value 140',
            160 => 'Value 160', 185 => 'Value 185', 180 => 'Value 180',
            170 => 'Value 170', 150 => 'Value 150', 215 => 'Value 215', 225 => 'Value 225',
            240 => 'Value 240', 230 => 'Value 230', 220 => 'Value 220', 360 => 'Value 360',
            300 => 'Value 300', 250 => 'Value 250', 200 => 'Value 200'
        ];
    }

    /**
     * Test: Breadth-first traversal
     */
    public function testBreadthFirstTraversal(): void
    {
        $this->assertSame(
            $this->getExpectedBFT(),
            $this->tree->breadthFirstTraversal(),
            "Did not match the expected breadth-first nodes. Failed BFT traversal."
        );
    }

    private function getExpectedBFT(): array
    {
        $this->populateTree();

        return [
            200 => 'Value 200', 150 => 'Value 150', 250 => 'Value 250',
            140 => 'Value 140', 170 => 'Value 170', 220 => 'Value 220',
            300 => 'Value 300', 130 => 'Value 130', 160 => 'Value 160',
            180 => 'Value 180', 215 => 'Value 215', 230 => 'Value 230', 360 => 'Value 360',
            110 => 'Value 110', 185 => 'Value 185', 225 => 'Value 225', 240 => 'Value 240',
            50 => 'Value 50', 115 => 'Value 115', 70 => 'Value 70'
        ];
    }

    /**
     * Test: Serialize and deserialize
     */
    public function testSerializationAndDeserialization(): void
    {
        $this->populateTree();

        $serializedData = $this->tree->serialize();
        $deserializedTree = $this->tree->deserialize($serializedData);

        $this->assertEquals(
            $this->tree->inOrderTraversal(),
            $deserializedTree->inOrderTraversal(),
            "Deserialized tree should match the original tree."
        );
        $this->assertEquals(
            $this->tree->size(),
            $deserializedTree->size(),
            "Deserialized tree size was not updated correctly."
        );
    }

    /**
     * Test: Verify all operations on a large tree.
     */
    public function testLargeTree(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            $this->tree->insert($i, "Value $i");
        }

        for ($i = 1; $i <= 1000; $i++) {
            $this->assertEquals("Value $i", $this->tree->search($i)->value, "Value for key $i should be 'Value $i'");
        }

        for ($i = 1; $i <= 1000; $i++) {
            $this->assertTrue($this->tree->isFound($this->tree->getRoot(), $i), "Node with key $i should exist");
        }

        for ($i = 1; $i <= 5; $i++) {
            $this->tree->remove($i);
            $this->assertFalse(
                $this->tree->isFound($this->tree->getRoot(), $i),
                "Value for key $i should be not exist after deletion"
            );
        }
    }

    /**
     * Provides traversal types and expected results for the iterator test.
     */
    public static function traversalProvider(): array
    {
        return [
            // Test case for In-Order traversal
            'InOrder' => [
                'traversalType' => 'inOrder',
                'expected' => [
                    50 => 'Value 50', 70 => 'Value 70', 110 => 'Value 110',
                    115 => 'Value 115', 130 => 'Value 130', 140 => 'Value 140',
                    150 => 'Value 150', 160 => 'Value 160', 170 => 'Value 170',
                    180 => 'Value 180', 185 => 'Value 185', 200 => 'Value 200', 215 => 'Value 215',
                    220 => 'Value 220', 225 => 'Value 225', 230 => 'Value 230', 240 => 'Value 240',
                    250 => 'Value 250', 300 => 'Value 300', 360 => 'Value 360',
                ],
            ],
            // Test case for Pre-Order traversal
            'PreOrder' => [
                'traversalType' => 'preOrder',
                'expected' => [
                    200 => 'Value 200', 150 => 'Value 150', 140 => 'Value 140',
                    130 => 'Value 130', 110 => 'Value 110', 50 => 'Value 50',
                    70 => 'Value 70', 115 => 'Value 115', 170 => 'Value 170',
                    160 => 'Value 160', 180 => 'Value 180', 185 => 'Value 185', 250 => 'Value 250',
                    220 => 'Value 220', 215 => 'Value 215', 230 => 'Value 230', 225 => 'Value 225',
                    240 => 'Value 240', 300 => 'Value 300', 360 => 'Value 360',
                ],
            ],
            // Test case for Post-Order traversal
            'PostOrder' => [
                'traversalType' => 'postOrder',
                'expected' => [
                    70 => 'Value 70', 50 => 'Value 50', 115 => 'Value 115',
                    110 => 'Value 110', 130 => 'Value 130', 140 => 'Value 140',
                    160 => 'Value 160', 185 => 'Value 185', 180 => 'Value 180',
                    170 => 'Value 170', 150 => 'Value 150', 215 => 'Value 215', 225 => 'Value 225',
                    240 => 'Value 240', 230 => 'Value 230', 220 => 'Value 220', 360 => 'Value 360',
                    300 => 'Value 300', 250 => 'Value 250', 200 => 'Value 200',
                ],
            ],
        ];
    }

    /**
     * Test: Iterating over the tree with inOrder, preOrder, and postOrder Traversals.
     *
     * @dataProvider traversalProvider
     */
    public function testIteratorWithTraversalTypes(string $traversalType, array $expected): void
    {
        $this->tree->setTraversalType($traversalType);
        $this->populateTree();

        $expectedKeys = array_keys($expected);
        $expectedValues = array_values($expected);

        $index = 0;

        foreach ($this->tree as $node) {
            $this->assertEquals(
                $expectedKeys[$index],
                $node->key,
                "Did not match the expected {$traversalType} key. Failed tree iteration."
            );
            $this->assertEquals(
                $expectedValues[$index],
                $node->value,
                "Did not match the expected {$traversalType} value. Failed tree iteration."
            );
            $index++;
        }
        $this->assertEquals(count($expected), $index, "Tree iteration did not visit the expected number of nodes.");
    }

    /**
     * Test: Iterating over the tree (default In-Order)
     */
    public function testIteratorInOrder(): void
    {
        $expectedInOrder = $this->getExpectedInOrder();

        $expectedKeys = array_keys($expectedInOrder);
        $expectedValues = array_values($expectedInOrder);

        $index = 0;

        foreach ($this->tree as $node) {
            $this->assertEquals(
                $expectedKeys[$index],
                $node->key,
                "Did not match the expected inOrder key. Failed tree iteration."
            );
            $this->assertEquals(
                $expectedValues[$index],
                $node->value,
                "Did not match the expected inOrder value. Failed tree iteration."
            );
            $index++;
        }
    }

    /**
     * Test: Iterating over the tree with Pre-Order traversal
     */
    public function testIteratorPreOrder(): void
    {
        $this->tree = new BSTree([], 'preOrder');

        $expectedPreOrder = $this->getExpectedPreOrder();

        $expectedKeys = array_keys($expectedPreOrder);
        $expectedValues = array_values($expectedPreOrder);

        $index = 0;

        foreach ($this->tree as $node) {
            $this->assertEquals(
                $expectedKeys[$index],
                $node->key,
                "Did not match the expected preOrder key. Failed tree iteration."
            );
            $this->assertEquals(
                $expectedValues[$index],
                $node->value,
                "Did not match the expected preOrder value. Failed tree iteration."
            );
            $index++;
        }
    }

    /**
     * Test: Iterating over the tree with Post-Order traversal
     */
    public function testIteratorPostOrder(): void
    {
        $this->tree->setTraversalType('postOrder');

        $expectedPostOrder = $this->getExpectedPostOrder();

        $expectedKeys = array_keys($expectedPostOrder);
        $expectedValues = array_values($expectedPostOrder);

        $index = 0;

        foreach ($this->tree as $node) {
            $this->assertEquals(
                $expectedKeys[$index],
                $node->key,
                "Did not match the expected inOrder key. Failed tree iteration."
            );
            $this->assertEquals(
                $expectedValues[$index],
                $node->value,
                "Did not match the expected inOrder value. Failed tree iteration."
            );
            $index++;
        }
    }
}
