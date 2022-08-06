<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/ShellSort.php';

use PHPUnit\Framework\TestCase;

class shellSortTest extends TestCase
{
    public function testShellSort() 
    {
        $array = array(2, 1, 6, 3, 0, 9, 5);
        $sorted = shellSort($array);
        $this->assertEquals([0, 1, 2, 3, 5, 6, 9], $sorted);
    }

    public function testShellSort2() 
    {
        $array = array(7, 9, 1, 6, 2, 5, 0));
        $sorted = shellSort($array);
        $this->assertEquals([0, 1, 2, 5, 6, 7, 9], $sorted);
    }

}