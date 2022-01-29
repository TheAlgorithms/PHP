<?php

use function PHPUnit\Framework\assertEquals;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Conversions/DecimalToBinary.php';

class DecimalToBinaryTest extends TestCase
{
    public function testDecimalToBinary()
    {
        assertEquals(decToBin(7), '111');
        assertEquals(decToBin(5), '101');
    }
}