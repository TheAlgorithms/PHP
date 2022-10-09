<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/GnomeSort.php';

use PHPUnit\Framework\TestCase;

class GnomeSortTest extends TestCase
{
    public function testGnomeSort()
    {
        $array = array(3, 0, 2, 5, -1, 4, 1);
        $sorted = gnomeSort($array);
        $this->assertEquals([-1, 0, 1, 2, 3, 4, 5], $sorted);
    }

    public function testGnomeSort2()
    {
        $array = array(8, -50, 1, 90, 35, 47, 69, -5);
        $sorted = gnomeSort($array);
        $this->assertEquals([-50, -5, 1, 8, 35, 47, 69, 90], $sorted);
    }
}
