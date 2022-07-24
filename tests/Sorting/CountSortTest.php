<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/CountSort.php';

class countSortTest extends TestCase
{
    /**
     * @group countSort
     */
    public function testCountSortCipher()
    {
        $firstArray = array(20, 16, -5, -8, 6, 12, 2, 4, -3, 9);
        $expectedResultOne = array(-8, -5, -3, 2, 4, 6, 9, 12, 16, 20);
        $secondArray = array(-6, 12, 14, 17, 5, 4, -9, 15, 0, -8);
        $expectedResultTwo = array(-9, -8, -6, 0, 4, 5, 12, 14, 15, 17);

        $resultOne = countSort($firstArray, $minRange = -10, $maxRange = 20);
        $resultTwo = countSort($secondArray, $minRange = -10, $maxRange = 20);

        $this->assertEquals($expectedResultOne, $resultOne);
        $this->assertEquals($expectedResultTwo, $resultTwo);
    }
}
