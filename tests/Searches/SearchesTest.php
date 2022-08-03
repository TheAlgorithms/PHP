<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Searches/BinarySearch.php';
require_once __DIR__ . '/../../Searches/FibonacciSearch.php';
require_once __DIR__ . '/../../Searches/LinearSearch.php';
require_once __DIR__ . '/../../Searches/LowerBound.php';
require_once __DIR__ . '/../../Searches/UpperBound.php';
require_once __DIR__ . '/../../Searches/JumpSearch.php';


class SearchesTest extends TestCase
{
    public function testBinarySearchIterative()
    {
        $list = [0, 5, 7, 10, 15];
        $target = 0;
        $result = binarySearchIterative($list, $target);
        assertEquals(0, $result);
        $target = 15;
        $result = binarySearchIterative($list, $target);
        assertEquals(4, $result);
        $target = 5;
        $result = binarySearchIterative($list, $target);
        assertEquals(1, $result);
        $target = 6;
        $result = binarySearchIterative($list, $target);
        assertEquals(null, $result);
    }

    public function testBinarySearchByRecursion()
    {
        $list = [0, 5, 7, 10, 15];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        assertEquals(0, $result);
        $target = 15;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        assertEquals(4, $result);
        $target = 5;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        assertEquals(1, $result);
        $target = 6;
        $result = binarySearchByRecursion($list, $target, 0, 4);
        assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithEmptyList()
    {
        $list = [];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 0);
        assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithOneElementList()
    {
        $list = [0];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 0);
        assertEquals(0, $result);
        $target = 1;
        $result = binarySearchByRecursion($list, $target, 0, 0);
        assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithTwoElementList()
    {
        $list = [0, 1];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 1);
        assertEquals(0, $result);
        $target = 1;
        $result = binarySearchByRecursion($list, $target, 0, 1);
        assertEquals(1, $result);
        $target = 2;
        $result = binarySearchByRecursion($list, $target, 0, 1);
        assertEquals(null, $result);
    }

    public function testBinarySearchByRecursionWithThreeElementList()
    {
        $list = [0, 1, 2];
        $target = 0;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        assertEquals(0, $result);
        $target = 1;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        assertEquals(1, $result);
        $target = 2;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        assertEquals(2, $result);
        $target = 3;
        $result = binarySearchByRecursion($list, $target, 0, 2);
        assertEquals(null, $result);
    }

    public function testFibonacciSearch()
    {
        $test1 = fibonacciPosition(6);
        assertEquals(8, $test1);

        $test2 = fibonacciPosition(9);
        assertEquals(34, $test2);

        $test3 = fibonacciPosition(60);
        assertEquals(1548008755920, $test3);
    }

    public function testLinearSearch()
    {
        $list = [5, 7, 8, 11, 12, 15, 17, 18, 20];
        $target = 15;
        $result = linearSearch($list, $target);
        assertEquals(6, $result);
    }

    public function testLowerBound()
    {
        $list = [1, 2, 3, 3, 3, 4, 5, 9];
        $target = 3;
        $result = lowerBound($list, $target);
        assertEquals(2, $result);
    }

    public function testUpperBound()
    {
        $list = [1, 2, 3, 3, 3, 4, 5, 9];
        $target = 3;
        $result = upperBound($list, $target);
        assertEquals(5, $result);
    }
    
    public function testUpperBound()
    {
        $list = [1, 2, 3, 3, 3, 4, 5, 9];
        $target = 3;
        $result = upperBound($list, $target);
        assertEquals(5, $result);
    }
    
    public function testJumpSearch()
    {
        $list = array( 3,5,6,7,9,10,12,20,22,24);
        $target = 12;
        $result = jumpSearch($list, $target);
        assertEquals(6, $result);
    }
    
}
