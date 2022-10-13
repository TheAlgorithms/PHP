<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/AbsoluteMax.php';
require_once __DIR__ . '/../../Maths/ArmstrongNumber.php';
require_once __DIR__ . '/../../Maths/AbsoluteMin.php';
require_once __DIR__ . '/../../Maths/CheckPalindrome.php';
require_once __DIR__ . '/../../Maths/CheckPrime.php';
require_once __DIR__ . '/../../Maths/Factorial.php';
require_once __DIR__ . '/../../Maths/FastExponentiation.php';
require_once __DIR__ . '/../../Maths/Fibonacci.php';
require_once __DIR__ . '/../../Maths/Fibonacci2.php';
require_once __DIR__ . '/../../Maths/NeonNumber.php';
require_once __DIR__ . '/../../Maths/PerfectSquare.php';
require_once __DIR__ . '/../../Maths/Mean.php';
require_once __DIR__ . '/../../Maths/Median.php';
require_once __DIR__ . '/../../Maths/Mode.php';

class MathsTest extends TestCase
{
    public function testFactorial()
    {
        assertEquals(1, factorial(1));
        assertEquals(120, factorial(5));
        assertEquals(1, factorial(0));
        $this->expectException(\Exception::class);
        factorial(-25);
    }

public function testIsNumberArmstrong()

    {
        assertTrue(isNumberArmstrong(153));
        assertFalse(isNumberArmstrong(123));
        assertTrue(isNumberArmstrong(370));
        assertFalse(isNumberArmstrong(2468));
    }

public function testIsNumberPalindromic()

    {
        assertTrue(isNumberPalindromic(121));
        assertFalse(isNumberPalindromic(123));
        assertTrue(isNumberPalindromic(123321));
        assertFalse(isNumberPalindromic(2468));
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
        assertTrue(isPerfectSquare(25));
        assertFalse(isPerfectSquare(43));
        assertFalse(isPerfectSquare(2));
        assertTrue(isPerfectSquare(225));
    }

    public function testFastExponentiation()
    {
        assertEquals(fastExponentiation(10, 0), 1);
        assertEquals(fastExponentiation(10, 1), 10);
        assertEquals(fastExponentiation(10, 2), 100);
        assertEquals(fastExponentiation(10, 3), 1000);
        assertEquals(fastExponentiation(20, 5), 3200000);
    }

    public function testFibonacciSeries()
    {
        assertEquals([0, 1, 1, 2, 3], fibonacciRecursive(5));
        assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], fibonacciRecursive(10));

        assertEquals([0, 1, 1, 2, 3], fibonacciWithBinetFormula(5));
        assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], fibonacciWithBinetFormula(10));
    }

    public function testNeonNumber()
    {
        assertTrue(isNumberNeon(1));
        assertFalse(isNumberNeon(43));
        assertFalse(isNumberNeon(123));
        assertTrue(isNumberNeon(9));
    }
    public function testFibonacciGenerator()
    {
        assertEquals([0, 1, 1, 2, 3], iterator_to_array(loop(5, fib())));
        assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], iterator_to_array(loop(10, fib())));

        assertEquals([0, 1, 1, 2, 3], iterator_to_array(loop(5, fib())));
        assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], iterator_to_array(loop(10, fib())));
    }

    public function testMean()
    {
        mean(2,3,9,6);
        mean(7);
        mean(42,77,89,35);
    }

    public function testMedian()
    {
        median(1,2,8,11);
        median(40,90);
        median(35,66,91,27);
    }

    public function testMode()
    {
        mode(4,2,7,9,2,9,0,4,2);
        mode(21,72,40,21,0,99,21,99,0,40);
        mode(3,3,3,3);
    }
}
