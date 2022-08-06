<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/CombSort.php';

use PHPUnit\Framework\TestCase;

class combSortTest extends TestCase
{
    public function testCombSort() 
    {
        $array = array(5, 2, 1, 7, -2, 8, 4);
        $sorted = combSort($array);
        $this->assertEquals([-2, 1, 2, 4, 5, 7, 8], $sorted);
    }

    public function testCombSort2() 
    {
        $array = array(-4, -1, 7, 0, 5, 3, 1);
        $sorted = combSort($array);
        $this->assertEquals([-4, -1, 0, 1, 3, 5, 7], $sorted);
    }

}