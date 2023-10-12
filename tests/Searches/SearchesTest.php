<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Searches/BinarySearch.php';
require_once __DIR__ . '/../../Searches/FibonacciSearch.php';
require_once __DIR__ . '/../../Searches/LinearSearch.php';
require_once __DIR__ . '/../../Searches/LowerBound.php';
require_once __DIR__ . '/../../Searches/UpperBound.php';
require_once __DIR__ . '/../../Searches/JumpSearch.php';
require_once __DIR__ . '/../../Searches/ExponentialSearch.php';
require_once __DIR__ . '/../../Searches/TernarySearch.php';
require_once __DIR__ . '/../../Searches/InterpolationSearch.php';
require_once __DIR__ . '/../../Searches/SentinelSearch.php';


class SearchesTest extends TestCase
{
    public function testBinarySearchIterative()
    {
        $list = [0, 5, 7, 10, 15];
        $target = 0;
        $result = binarySearchIterative($list, $target);
        $this->assertEquals(0, $result);
        $target = 15;
        $result = binarySearchIterative($list, $target);
        $this->assertEquals(4, $result);
        $target = 5;
        $result = binarySearchIterative($list, $target);
        $this->assertEquals(1, $result);
        $target = 6;
        $result = binarySearchIterative($list, $target);
        $this->assertEquals(null, $result);
    }

    public function testBinarySearchByRecursion()
    {
        $list = [0, 5, 7, 10, 15];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(0, $result);
        $target = 15;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(4, $result);
        $target = 5;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(1, $result);
        $target = 6;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithEmptyList()
    {
        $list = [];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 0);
        $this->assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithOneElementList()
    {
        $list = [0];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 0);
        $this->assertEquals(0, $result);
        $target = 1;
        $result = binarySearchByRecursion($list, $target, 0, 0);
        $this->assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithTwoElementList()
    {
        $list = [0, 1];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 1);
        $this->assertEquals(0, $result);
        $target = 1;
        $result = binarySearchByRecursion($list, $target, 0, 1);
        $this->assertEquals(1, $result);
        $target = 2;
        $result = binarySearchByRecursion($list, $target, 0, 1);
        $this->assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithThreeElementList()
    {
        $list = [0, 1, 2];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        $this->assertEquals(0, $result);
        $target = 1;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        $this->assertEquals(1, $result);
        $target = 2;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        $this->assertEquals(2, $result);
        $target = 3;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        $this->assertEquals(null, $result);
    }

    public function testFibonacciSearch()
    {
        $test1 = fibonacciPosition(6);
        $this->assertEquals(8, $test1);

        $test2 = fibonacciPosition(9);
        $this->assertEquals(34, $test2);

        $test3 = fibonacciPosition(60);
        $this->assertEquals(1548008755920, $test3);
    }

    public function testLinearSearch()
    {
        $list = [5, 7, 8, 11, 12, 15, 17, 18, 20];
        $target = 15;
        $result = linearSearch($list, $target);
        $this->assertEquals(6, $result);
    }

    public function testLowerBound()
    {
        $list = [1, 2, 3, 3, 3, 4, 5, 9];
        $target = 3;
        $result = lowerBound($list, $target);
        $this->assertEquals(2, $result);
    }

    public function testUpperBound()
    {
        $list = [1, 2, 3, 3, 3, 4, 5, 9];
        $target = 3;
        $result = upperBound($list, $target);
        $this->assertEquals(5, $result);
    }

    public function testJumpSearch()
    {
        $list = array( 3,5,6,7,9,10,12,20,22,24);
        $target = 12;
        $result = jumpSearch($list, $target);
        $this->assertEquals(6, $result);
    }

    public function testExponentialSearch()
    {
        $list = array(2,3,4,7,28,35,63,98);
        $target = 35;
        $result = exponentialSearch($list, $target);
        $this->assertEquals(5, $result);
    }

    public function testTernarySearchIterative()
    {
        $list = [0, 5, 7, 10, 15];
        $target = 0;
        $result = ternarySearchIterative($list, $target);
        $this->assertEquals(0, $result);
        $target = 15;
        $result = ternarySearchIterative($list, $target);
        $this->assertEquals(4, $result);
        $target = 5;
        $result = ternarySearchIterative($list, $target);
        $this->assertEquals(1, $result);
        $target = 6;
        $result = ternarySearchIterative($list, $target);
        $this->assertEquals(null, $result);
    }

    public function testTernarySearchByRecursion()
    {
        $list = [0, 5, 7, 10, 15];
        $target = 0;
        $result = ternarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(0, $result);
        $target = 15;
        $result = ternarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(4, $result);
        $target = 5;
        $result = ternarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(1, $result);
        $target = 6;
        $result = ternarySearchByRecursion($list, $target, 0, 4);
        $this->assertEquals(null, $result);
    }

    public function testInterpolationSearch()
    {
        $list = [2, 6, 8, 10, 12, 14, 16, 18, 20, 22, 26, 34, 39];
        $target = 20;
        $result = interpolationSearch($list, $target);
        $this->assertEquals(8, $result);
        $target = 12;
        $result = interpolationSearch($list, $target);
        $this->assertEquals(4, $result);
        $target = 1000;
        $result = interpolationSearch($list, $target);
        $this->assertEquals(null, $result);
        $target = 39;
        $result = interpolationSearch($list, $target);
        $this->assertEquals(12, $result);
    }
    
    public function testSentinelSearch()
    {
        $list = [1,3,5,2,4,13,18,23,25,30];
        $target = 1;
        $result = SentinelSearch($list, $target);
        $this->assertEquals(0, $result);
        $target = 2;
        $result = SentinelSearch($list, $target);
        $this->assertEquals(3, $result);
        $target = 1000;
        $result = SentinelSearch($list, $target);
        $this->assertEquals(-1, $result);
        $target = -2;
        $result = SentinelSearch($list, $target);
        $this->assertEquals(-1, $result);
    }
}
