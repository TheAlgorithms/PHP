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

    public function testSegmentTreeUpdate(): void
    {
        // Test update functionality for different query types
        // Sum Query
        $segmentTreeSum = new SegmentTree($this->testArray);
        $segmentTreeSum->update(2, 10);  // Update index 2 to 10
        $this->assertEquals(
            29,
            $segmentTreeSum->query(1, 4),
            "After update, sum between index 1 and 4 should return 29."
        );

        // Max Query: with callback
        $segmentTreeMax = new SegmentTree($this->testArray, fn($a, $b) => max($a, $b));
        $segmentTreeMax->update(12, -1);  // Update index 12 to -1
        $this->assertEquals(
            19,
            $segmentTreeMax->query(5, 12),
            "After update, max between index 5 and 12 should return 19."
        );

        // Min Query: with callback
        $segmentTreeMin = new SegmentTree($this->testArray, fn($a, $b) => min($a, $b));
        $segmentTreeMin->update(9, -5);  // Update index 9 to -5
        $this->assertEquals(
            -5,
            $segmentTreeMin->query(9, 13),
            "After update, min between index 9 and 13 should return -5."
        );
    }

    public function testSegmentTreeRangeUpdate(): void
    {
        // Test range update functionality for different query types
        // Sum Query
        $segmentTreeSum = new SegmentTree($this->testArray);
        $segmentTreeSum->rangeUpdate(3, 7, 0);      // Set indices 3 to 7 to 0
        $this->assertEquals(
            55,
            $segmentTreeSum->query(2, 10),
            "After range update, sum between index 2 and 10 should return 55."
        );

        // Max Query: with callback
        $segmentTreeMax = new SegmentTree($this->testArray, fn($a, $b) => max($a, $b));
        $segmentTreeMax->rangeUpdate(3, 7, 0);      // Set indices 3 to 7 to 0
        $this->assertEquals(
            5,
            $segmentTreeMax->query(2, 7),
            "After range update, max between index 2 and 7 should return 5."
        );

        // Min Query: with callback
        $segmentTreeMin = new SegmentTree($this->testArray, fn($a, $b) => min($a, $b));
        $segmentTreeMin->rangeUpdate(3, 9, 0);      // Set indices 3 to 9 to 0
        $this->assertEquals(
            0,
            $segmentTreeMin->query(2, 9),
            "After range update, min between index 2 and 9 should return 0."
        );
    }
}