<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\TestCase;


require_once __DIR__ . '/../geometry/square.php';

class geometryTest extends TestCase{

    public function squareArea(){
        assertEquals(4, area(2));
        assertEquals(11.2, area(5.6));
        assertEquals(3.45, area(6.9));
    }

    public function squareCircumference(){
        assertEquals(8, circumference(2));
        assertEquals(22.4, circumference(5.6));
        assertEquals(13.8, circumference(3.45));
    }
}