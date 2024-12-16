<?php

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/CompareBinaryTree/Node.php';
require_once __DIR__ . '/../../DataStructures/CompareBinaryTree/CompareBinaryTree.php';

use DataStructures\CompareBinaryTree\CompareBinaryTree;
use DataStructures\CompareBinaryTree\Node;
use PHPUnit\Framework\TestCase;

class CompareBinaryTreeTest extends TestCase
{
    public function testBinaryTreesAreEqualWhenAreEqualInReality()
    {
        $tree1 = new Node(
            'A',
            new Node(
                'B',
                new Node(
                    'D'
                ),
                new Node(
                    'E',
                    null,
                    new Node(
                        'F'
                    )
                )
            ),
            new Node(
                'C',
                new Node('G')
            )
        );

        $tree2 = clone $tree1;

        $sut = new CompareBinaryTree();
        $this->assertTrue($sut->areTreesEqual($tree1, $tree2));
    }

    public function testBinaryTreesAreNotEqualWhenAreNotEqualInReality()
    {

        $tree1 = new Node(
            'A',
            new Node(
                'B',
                new Node(
                    'F'
                ),
                new Node(
                    'E',
                    null,
                    new Node(
                        'D'
                    )
                )
            ),
            new Node(
                'C',
                new Node('G')
            )
        );

        $tree2 = new Node(
            'A',
            new Node(
                'B',
                new Node(
                    'F'
                ),
                new Node(
                    'E',
                    null,
                    new Node(
                        'D'
                    )
                )
            ),
            new Node(
                'C'
            )
        );

        $sut = new CompareBinaryTree();
        $this->assertFalse($sut->areTreesEqual($tree1, $tree2));
    }
}
