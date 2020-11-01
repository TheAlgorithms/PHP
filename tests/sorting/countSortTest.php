<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../sorting/countSort.php';

class countSortTest extends TestCase
{


    /**
     * @group countSort
     */
    public function testCountSortCipher()
    {

        $unsorted = array(20, 16, -5, -8, 6, 12, 2, 4, -3, 9);
        $sorted = array(-8, -5, -3, 2, 4, 6, 9, 12, 16, 20);
        $this->assertEquals(implode(', ', $sorted),implode(', ', countSort($unsorted, $minRange = -10, $maxRange = 20)));

    }



}
