<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/QuickSort.php';

use PHPUnit\Framework\TestCase;

class quickSortTest extends TestCase
{
    /**
     * @group quickSort
     */
    public function testQuickSortCipher()
    {
        $array1 = [20, 16, -5, -8, 6, 12, 2, 4, -3, 9];
        $array2 = [-6, 12, 14, 17, 5, 4, -9, 15, 0, -8];

        $result1 = [-8, -5, -3, 2, 4, 6, 9, 12, 16, 20];
        $result2 = [-9, -8, -6, 0, 4, 5, 12, 14, 15, 17];

        $test1 = quickSort($array1);
        $test2 = quickSort($array2);

        $this->assertEquals($result1, $test1);
        $this->assertEquals($result2, $test2);
    }
}

