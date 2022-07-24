<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Searches/FibonacciSearch.php';

use PHPUnit\Framework\TestCase;

class fibonacciSearchTest extends TestCase
{
    /*
     * answers were verified on a couple of different web based apps
     * I am counting from 1, some counters starts at 0 which skews everything
     * by 1 position!
     */
    public function testFibonacciSearch()
    {
        $test1 = fibonacciPosition(6); // 8
        $test2 = fibonacciPosition(9); // 34
        $test3 = fibonacciPosition(60); // 1548008755920

        $this->assertEquals(8, $test1);
        $this->assertEquals(34, $test2);
        $this->assertEquals(1548008755920, $test3);
    }
}
