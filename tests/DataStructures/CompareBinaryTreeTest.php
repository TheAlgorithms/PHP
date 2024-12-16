<?php

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/BinaryTreeNode.php';
require_once __DIR__ . '/../../DataStructures/CompareBinaryTree.php';

use PHPUnit\Framework\TestCase;

class CompareBinaryTreeTest extends TestCase
{
    public function testBinaryTreesAreEqualWhenAreEqualInReality()
    {
        $tree1 = new BinaryTreeNode(
            'A',
            new BinaryTreeNode(
                'B',
                new BinaryTreeNode(
                    'D'
                ),
                new BinaryTreeNode(
                    'E',
                    null,
                    new BinaryTreeNode(
                        'F'
                    )
                )
            ),
            new BinaryTreeNode(
                'C',
                new BinaryTreeNode('G')
            )
        );

        $tree2 = clone $tree1;

        $sut = new CompareBinaryTree();
        $this->assertTrue($sut->areTreesEqual($tree1, $tree2));
    }

    public function testBinaryTreesAreNotEqualWhenAreNotEqualInReality()
    {

        $tree1 = new BinaryTreeNode(
            'A',
            new BinaryTreeNode(
                'B',
                new BinaryTreeNode(
                    'F'
                ),
                new BinaryTreeNode(
                    'E',
                    null,
                    new BinaryTreeNode(
                        'D'
                    )
                )
            ),
            new BinaryTreeNode(
                'C',
                new BinaryTreeNode('G')
            )
        );

        $tree2 = new BinaryTreeNode(
            'A',
            new BinaryTreeNode(
                'B',
                new BinaryTreeNode(
                    'F'
                ),
                new BinaryTreeNode(
                    'E',
                    null,
                    new BinaryTreeNode(
                        'D'
                    )
                )
            ),
            new BinaryTreeNode(
                'C'
            )
        );

        $sut = new CompareBinaryTree();
        $this->assertFalse($sut->areTreesEqual($tree1, $tree2));
    }
}
