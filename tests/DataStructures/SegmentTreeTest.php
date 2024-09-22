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

    /**
     * Test update functionality for different query types.
     */
    public function testSegmentTreeUpdate(): void
    {
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

    /**
     * Test range update functionality for different query types.
     */
    public function testSegmentTreeRangeUpdate(): void
    {
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

    /**
     * Test array updates reflections.
     */
    public function testGetCurrentArray(): void
    {
        $segmentTree = new SegmentTree($this->testArray);

        // Ensure the initial array matches the input array
        $this->assertEquals(
            $this->testArray,
            $segmentTree->getCurrentArray(),
            "getCurrentArray() should return the initial array."
        );

        // Perform an update and test again
        $segmentTree->update(2, 10);  // Update index 2 to 10
        $updatedArray = $this->testArray;
        $updatedArray[2] = 10;

        $this->assertEquals(
            $updatedArray,
            $segmentTree->getCurrentArray(),
            "getCurrentArray() should return the updated array."
        );
    }

    /**
     * Test serialization and deserialization of the segment tree.
     */
    public function testSegmentTreeSerialization(): void
    {
        $segmentTree = new SegmentTree($this->testArray);
        $serialized = $segmentTree->serialize();

        $deserializedTree = SegmentTree::deserialize($serialized);
        $this->assertEquals(
            $segmentTree->query(1, 4),
            $deserializedTree->query(1, 4),
            "Serialized and deserialized trees should have the same query results."
        );
    }

    /**
     * Testing EdgeCases: first and last indices functionality on the Segment Tree
     */
    public function testEdgeCases(): void
    {
        $segmentTree = new SegmentTree($this->testArray);
        $firstIndex = 0;
        $lastIndex = count($this->testArray) - 1;

        // Test querying the first and last indices
        $this->assertEquals(
            $this->testArray[$firstIndex],
            $segmentTree->query($firstIndex, $firstIndex),
            "Query at the first index should return {$this->testArray[$firstIndex]}."
        );
        $this->assertEquals(
            $this->testArray[$lastIndex],
            $segmentTree->query($lastIndex, $lastIndex),
            "Query at the last index should return {$this->testArray[$lastIndex]}."
        );


        // Test updating the first index
        $segmentTree->update($firstIndex, 100);     // Update first index to 100
        $this->assertEquals(
            100,
            $segmentTree->query($firstIndex, $firstIndex),
            "After update, query at the first index should return {$this->testArray[$firstIndex]}."
        );

        // Test updating the last index
        $segmentTree->update($lastIndex, 200);  // Update last index to 200
        $this->assertEquals(
            200,
            $segmentTree->query($lastIndex, $lastIndex),
            "After update, query at the last index should return {$this->testArray[$lastIndex]}."
        );

        // Test range update that includes the first index
        $segmentTree->rangeUpdate($firstIndex, 2, 50);  // Set indices 0 to 2 to 50
        $this->assertEquals(
            50,
            $segmentTree->query($firstIndex, $firstIndex),
            "After range update, query at index $firstIndex should return 50."
        );
        $this->assertEquals(50, $segmentTree->query(1, 1), "After range update, query at index 1 should return 50.");
        $this->assertEquals(50, $segmentTree->query(2, 2), "After range update, query at index 2 should return 50.");

        // Test range update that includes the last index
        $segmentTree->rangeUpdate($lastIndex - 3, $lastIndex, 10);  // Set indices to 10
        $this->assertEquals(
            10,
            $segmentTree->query($lastIndex, $lastIndex),
            "After range update, query at the last index should return 10."
        );
        $this->assertEquals(
            10,
            $segmentTree->query(count($this->testArray) - 2, count($this->testArray) - 2),
            "After range update, query at the second last index should return 10."
        );
    }

    /**
     * Test empty or unsupported arrays.
     */
    public function testUnsupportedOrEmptyArrayInitialization(): void
    {
        // Test empty array
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Array must not be empty, must contain numeric values 
            and must be non-associative.");

        $segmentTreeEmpty = new SegmentTree([]);        // expecting an exception

        // Test unsupported array (e.g., with non-numeric values)
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Array must not be empty, must contain numeric values 
            and must be non-associative.");

        $segmentTreeUnsupported = new SegmentTree([1, "two", 3]);  // Mix of numeric and non-numeric
    }


    /**
     * Test exception for invalid update index.
     */
    public function testInvalidUpdateIndex(): void
    {
        $segmentTree = new SegmentTree($this->testArray);

        $index = count($this->testArray) + 5;

        // Expect an exception for range update with invalid indices
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessage("Index out of bounds: $index. Must be between 0 and "
            . (count($this->testArray) - 1));

        $segmentTree->update($index, 100);     // non-existing index, should trigger exception
    }

    /**
     *  Test exception for invalid update index.
     */
    public function testOutOfBoundsQuery(): void
    {
        $segmentTree = new SegmentTree($this->testArray);

        $start = 0;
        $end = count($this->testArray);

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessage("Index out of bounds: start = $start, end = $end. 
            Must be between 0 and " . (count($this->testArray) - 1));

        $segmentTree->query(0, count($this->testArray));  // expecting an exception
    }

    /**
     *  Test exception for invalid range update.
     */
    public function testInvalidRangeUpdate(): void
    {
        $segmentTree = new SegmentTree($this->testArray);

        $start = -1;
        $end = 5;

        // Expect an exception for range update with invalid indices
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessage("Invalid range: start = $start, end = $end.");

        $segmentTree->rangeUpdate(-1, 5, 0);  // Negative index, should trigger exception
    }
}
