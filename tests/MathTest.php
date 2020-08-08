<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Maths/Factorial.php';
require_once __DIR__ . '/../Maths/CheckPrime.php';
require_once __DIR__ . '/../Maths/AbsoluteMax.php';
require_once __DIR__ . '/../Maths/AbsoluteMin.php';
require_once __DIR__ . '/../Maths/PerfectSquare.php';

class MathTest extends TestCase
{
    public function testFactorial()
    {
        assertEquals(1, factorial(1));
        assertEquals(120, factorial(5));
        assertEquals(1, factorial(0));
        $this->expectException(\Exception::class);
        factorial(-25);
    }

    public function testIsPrime()
    {
        assertTrue(isPrime(73));
        assertFalse(isPrime(21));
        assertFalse(isPrime(1));
        assertTrue(isPrime(997));
    }

    public function testAbsoluteMax()
    {
        assertEquals(50, absolute_max(12, 20, 35, 50, 50, 23));
        assertEquals(13, absolute_max(13));
        assertEquals(54, absolute_max(12, 13, 54, 22));
        $this->expectException(\Exception::class);
        absolute_max();
    }

    public function testAbsoluteMin()
    {
        assertEquals(12, absolute_min(12, 20, 35, 50, 50, 23));
        assertEquals(13, absolute_min(13));
        assertEquals(12, absolute_min(12, 13, 54, 22));
        $this->expectException(\Exception::class);
        absolute_min();
    }

    public function testPerfectSquare()
    {
        assertTrue(is_perfect_square(25));
        assertFalse(is_perfect_square(43));
        assertFalse(is_perfect_square(2));
        assertTrue(is_perfect_square(225));
    }
}
