<?php

namespace DataStructures;

require_once __DIR__ . '/../../DataStructures/SegmentTree/SegmentTree.php';
require_once __DIR__ . '/../../DataStructures/SegmentTree/SegmentTreeNode.php';

use DataStructures\SegmentTree\SegmentTree;
use InvalidArgumentException;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;

class SegmentTreeTest extends TestCase
{
    private array $testArray;

    protected function setUp(): void
    {
        $this->testArray = [1, 3, 5, 7, 9, 11, 13, 14, 15, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26];
    }

    public static function sumQueryProvider(): array
    {
        return [
            // Format: [expectedResult, startIndex, endIndex]
            [24, 1, 4],
            [107, 5, 11],
            [91, 2, 9],
            [23, 15, 15],
        ];
    }

    /**
     * Test sum queries using data provider.
     * @dataProvider sumQueryProvider
     */
    public function testSegmentTreeSumQuery(int $expected, int $startIndex, int $endIndex): void
    {
        // Test the default case: sum query
        $segmentTree = new SegmentTree($this->testArray);
        $this->assertEquals(
            $expected,
            $segmentTree->query($startIndex, $endIndex),
            "Query sum between index $startIndex and $endIndex should return $expected."
        );
    }

    public static function maxQueryProvider(): array
    {
        return [
            [26, 0, 18],
            [13, 2, 6],
            [22, 8, 14],
            [11, 5, 5],
        ];
    }

    /**
     * Test max queries using data provider.
     * @dataProvider maxQueryProvider
     */
    public function testSegmentTreeMaxQuery(int $expected, int $startIndex, int $endIndex): void
    {
        $segmentTree = new SegmentTree($this->testArray, fn($a, $b) => max($a, $b));
        $this->assertEquals(
            $expected,
            $segmentTree->query($startIndex, $endIndex),
            "Max query between index $startIndex and $endIndex should return $expected."
        );
    }

    public static function minQueryProvider(): array
    {
        return [
            [1, 0, 18],
            [5, 2, 7],
            [18, 10, 17],
            [17, 9, 9],
        ];
    }

    /**
     * Test min queries using data provider.
     * @dataProvider minQueryProvider
     */
    public function testSegmentTreeMinQuery(int $expected, int $startIndex, int $endIndex): void
    {
        $segmentTree = new SegmentTree($this->testArray, function ($a, $b) {
            return min($a, $b);
        });
        $this->assertEquals(
            $expected,
            $segmentTree->query($startIndex, $endIndex),
            "Query min between index $startIndex and $endIndex should return $expected."
        );
    }
}
