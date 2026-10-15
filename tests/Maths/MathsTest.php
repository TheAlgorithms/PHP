<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/AbsoluteMax.php';
require_once __DIR__ . '/../../Maths/ArmstrongNumber.php';
require_once __DIR__ . '/../../Maths/AbsoluteMin.php';
require_once __DIR__ . '/../../Maths/CheckEven.php';
require_once __DIR__ . '/../../Maths/CheckPalindrome.php';
require_once __DIR__ . '/../../Maths/CheckPrime.php';
require_once __DIR__ . '/../../Maths/CheckOdd.php';
require_once __DIR__ . '/../../Maths/Factorial.php';
require_once __DIR__ . '/../../Maths/FastExponentiation.php';
require_once __DIR__ . '/../../Maths/Fibonacci.php';
require_once __DIR__ . '/../../Maths/Fibonacci2.php';
require_once __DIR__ . '/../../Maths/GreatestCommonDivisor.php';
require_once __DIR__ . '/../../Maths/NeonNumber.php';
require_once __DIR__ . '/../../Maths/PerfectSquare.php';
require_once __DIR__ . '/../../Maths/MeasuresOfCentralTendency/Mean.php';
require_once __DIR__ . '/../../Maths/MeasuresOfCentralTendency/Median.php';
require_once __DIR__ . '/../../Maths/MeasuresOfCentralTendency/Mode.php';
require_once __DIR__ . '/../../Maths/FastInverseSquareRoot.php';
require_once __DIR__ . '/../../Maths/BaseX.php';
require_once __DIR__ . '/../../Maths/PerfectNumber.php';

class MathsTest extends TestCase
{
    public function testBaseX()
    {
        $this->assertEquals(11, baseX(3, 2));
        $this->assertEquals(22, baseX(8, 3));
        $this->assertEquals(21, baseX(15, 7));
        $this->assertEquals(20, baseX(16, 8));
    }

    public function testFactorial()
    {
        $this->assertEquals(1, factorial(1));
        $this->assertEquals(120, factorial(5));
        $this->assertEquals(1, factorial(0));
        $this->expectException(\Exception::class);
        factorial(-25);
    }

    public function testIsEven()
    {
        $this->assertTrue(isEven(2));
        $this->assertTrue(isEven(0));
        $this->assertFalse(isEven(3));
        $this->assertFalse(isEven(17));
        $this->assertTrue(isEven(-4));
    }

    public function testIsNumberArmstrong()
    {
        $this->assertTrue(isNumberArmstrong(153));
        $this->assertFalse(isNumberArmstrong(123));
        $this->assertTrue(isNumberArmstrong(370));
        $this->assertFalse(isNumberArmstrong(2468));
    }

    public function testIsNumberPalindromic()
    {
        $this->assertTrue(isNumberPalindromic(121));
        $this->assertFalse(isNumberPalindromic(123));
        $this->assertTrue(isNumberPalindromic(123321));
        $this->assertFalse(isNumberPalindromic(2468));
    }

    public function testIsOdd()
    {
        $this->assertTrue(isOdd(3));
        $this->assertTrue(isOdd(17));
        $this->assertFalse(isOdd(4));
        $this->assertFalse(isOdd(0));
        $this->assertTrue(isOdd(-5));
    }

    public function testIsPrime()
    {
        $this->assertTrue(isPrime(73));
        $this->assertFalse(isPrime(21));
        $this->assertFalse(isPrime(1));
        $this->assertTrue(isPrime(997));
    }

    public function testAbsoluteMax()
    {
        $this->assertEquals(50, absolute_max(12, 20, 35, 50, 50, 23));
        $this->assertEquals(13, absolute_max(13));
        $this->assertEquals(54, absolute_max(12, 13, 54, 22));
        $this->expectException(\Exception::class);
        absolute_max();
    }

    public function testAbsoluteMin()
    {
        $this->assertEquals(12, absolute_min(12, 20, 35, 50, 50, 23));
        $this->assertEquals(13, absolute_min(13));
        $this->assertEquals(12, absolute_min(12, 13, 54, 22));
        $this->expectException(\Exception::class);
        absolute_min();
    }

    public function testPerfectSquare()
    {
        $this->assertTrue(isPerfectSquare(25));
        $this->assertFalse(isPerfectSquare(43));
        $this->assertFalse(isPerfectSquare(2));
        $this->assertTrue(isPerfectSquare(225));
    }

    public function testFastExponentiation()
    {
        $this->assertEquals(1, fastExponentiation(10, 0));
        $this->assertEquals(10, fastExponentiation(10, 1));
        $this->assertEquals(100, fastExponentiation(10, 2));
        $this->assertEquals(1000, fastExponentiation(10, 3));
        $this->assertEquals(3200000, fastExponentiation(20, 5));
    }

    public function testFibonacciSeries()
    {
        $this->assertEquals([0, 1, 1, 2, 3], fibonacciRecursive(5));
        $this->assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], fibonacciRecursive(10));

        $this->assertEquals([0, 1, 1, 2, 3], fibonacciWithBinetFormula(5));
        $this->assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], fibonacciWithBinetFormula(10));
    }

    public function testNeonNumber()
    {
        $this->assertTrue(isNumberNeon(1));
        $this->assertFalse(isNumberNeon(43));
        $this->assertFalse(isNumberNeon(123));
        $this->assertTrue(isNumberNeon(9));
    }

    public function testFibonacciGenerator()
    {
        $this->assertEquals([0, 1, 1, 2, 3], iterator_to_array(loop(5, fib())));
        $this->assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], iterator_to_array(loop(10, fib())));

        $this->assertEquals([0, 1, 1, 2, 3], iterator_to_array(loop(5, fib())));
        $this->assertEquals([0, 1, 1, 2, 3, 5, 8, 13, 21, 34], iterator_to_array(loop(10, fib())));
    }

    public function testMean()
    {
        $this->assertEquals(
            (2 + 4 + 6 + 8 + 20 + 50 + 70) / 7,
            mean(2, 4, 6, 8, 20, 50, 70)
        );

        $this->assertEquals(
            (-5 - 7 + 10) / 3,
            mean(-5, -7, 10)
        );

        $this->assertEquals(-1, mean(-1));

        // Notebook example: Tax driver daily earning for 5 days
        // x = 100, 150, 200, 250, 300 => mean = 1000/5 = 200
        $this->assertEquals(200, mean(100, 150, 200, 250, 300));
    }

    public function testMeanDiscrete()
    {
        $this->assertEquals(
            ((10 * 2) + (20 * 3) + (30 * 5)) / (2 + 3 + 5),
            mean_discrete([10, 20, 30], [2, 3, 5])
        );

        $this->assertEquals(
            ((5 * 10) + (15 * 20)) / (10 + 20),
            mean_discrete([5, 15], [10, 20])
        );

        // Unsorted input
        $this->assertEquals(
            ((10 * 2) + (20 * 3) + (30 * 5)) / (2 + 3 + 5),
            mean_discrete([30, 10, 20], [5, 2, 3])
        );
    }

    public function testMeanDiscreteExceptionMismatchedArrays()
    {
        $this->expectException(\Exception::class);
        mean_discrete([1, 2], [1]);
    }

    public function testMeanDiscreteExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        mean_discrete([], []);
    }

    public function testMeanDiscreteExceptionZeroTotalFrequency()
    {
        $this->expectException(\Exception::class);
        mean_discrete([1, 2], [0, 0]);
    }

    public function testMeanContinuous()
    {
        $this->assertEquals(
            ((5 * 2) + (15 * 3) + (25 * 5)) / (2 + 3 + 5),
            mean_continuous([0, 10, 20], [10, 20, 30], [2, 3, 5])
        );

        $this->assertEquals(
            ((2.5 * 10) + (7.5 * 20)) / (10 + 20),
            mean_continuous([0, 5], [5, 10], [10, 20])
        );

        // Unsorted input 
        $this->assertEquals(
            ((5 * 2) + (15 * 3) + (25 * 5)) / (2 + 3 + 5),
            mean_continuous([20, 0, 10], [30, 10, 20], [5, 2, 3])
        );
    }

    public function testMeanContinuousExceptionMismatchedArrays()
    {
        $this->expectException(\Exception::class);
        mean_continuous([0, 10], [10, 20], [1]);
    }

    public function testMeanContinuousExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        mean_continuous([], [], []);
    }

    public function testMeanContinuousExceptionZeroTotalFrequency()
    {
        $this->expectException(\Exception::class);
        mean_continuous([0, 10], [10, 20], [0, 0]);
    }

    public function testMedian()
    {
        $this->assertEquals(3, median(1, 2, 3, 4, 5));
        $this->assertEquals(4.5, median(1, 2, 3, 4, 5, 6, 7, 8));
        $this->assertEquals(3, median(5, 3, 1, 2, 4));

        // Notebook example: House prices (odd n=5)
        // sorted: 7k,9k,12k,15k,20k => 3rd item = 12k
        $this->assertEquals(12, median(12, 7, 20, 15, 9));

        // Notebook example: Clinic waiting time (even n=6)
        // sorted: 6,10,14,18,22,25 => (14+18)/2=16
        $this->assertEquals(16, median(14, 6, 22, 18, 10, 25));
    }

    public function testMedianRejectsNonNumericValues()
    {
        $this->expectException(\Exception::class);

        median('a', 'b', 'c');
    }

    public function testMedianDiscrete()
    {
        // Odd total frequency (N=5)
        // Values: 10(2), 20(3). CF: 2, 5. N/2 = 2.5
        // Median is the value where CF >= 2.5, which is 20.
        $this->assertEquals(20, median_discrete([10, 20], [2, 3]));

        // Even total frequency (N=4)
        // Values: 10(2), 20(2). CF: 2, 4. Target = 2.
        // First value CF = 2 (exactly matches target). So average of 10 and 20 = 15.
        $this->assertEquals(15, median_discrete([10, 20], [2, 2]));

        // Even total frequency (N=6)
        // Values: 10(1), 20(4), 30(1). CF: 1, 5, 6. Target = 3.
        // First value > 3 is 20 (CF=5), previous CF=1 (not 3). Median = 20.
        $this->assertEquals(20, median_discrete([10, 20, 30], [1, 4, 1]));

        // Zero-frequency
        $this->assertEquals(15, median_discrete([10, 15, 20], [2, 0, 2]));

        // Unsorted input
        $this->assertEquals(20, median_discrete([20, 10], [3, 2]));
    }

    public function testMedianDiscreteExceptionMismatchedArrays()
    {
        $this->expectException(\Exception::class);
        median_discrete([1, 2], [1]);
    }

    public function testMedianDiscreteExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        median_discrete([], []);
    }

    public function testMedianDiscreteExceptionZeroTotalFrequency()
    {
        $this->expectException(\Exception::class);
        median_discrete([1, 2], [0, 0]);
    }

    public function testMedianContinuous()
    {
        // N = 10, Target = 5
        // Intervals: 0-10 (f=2, CF=2)
        //            10-20 (f=5, CF=7) -> Median Class
        //            20-30 (f=3, CF=10)
        // Formula: L = 10, f = 5, h = 10, prevCF = 2
        // Median = 10 + ((5 - 2) / 5) * 10 = 10 + (3/5)*10 = 10 + 6 = 16
        $this->assertEquals(16, median_continuous([0, 10, 20], [10, 20, 30], [2, 5, 3]));

        // Unsorted input
        $this->assertEquals(16, median_continuous([20, 0, 10], [30, 10, 20], [3, 2, 5]));
    }

    public function testMedianContinuousExceptionMismatchedArrays()
    {
        $this->expectException(\Exception::class);
        median_continuous([0, 10], [10, 20], [1]);
    }

    public function testMedianContinuousExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        median_continuous([], [], []);
    }

    public function testMedianContinuousExceptionZeroTotalFrequency()
    {
        $this->expectException(\Exception::class);
        median_continuous([0, 10], [10, 20], [0, 0]);
    }

    public function testMode()
    {
        $this->assertEquals([3], mode(1, 2, 3, 3, 4, 5));
        $this->assertEquals([5, 6], mode(5, 5, 6, 6, 7));
        $this->assertEquals([1, 2, 3, 4, 5], mode(1, 2, 3, 4, 5));
        $this->assertEquals([2, 3, 4], mode(2, 2, 3, 3, 4, 4));

        // Notebook example: Shoe store  last 7 shoes sold: 8,2,8,3,5,8,2
        // Mode = 8 (appears 3 times)
        $this->assertEquals([8], mode(8, 2, 8, 3, 5, 8, 2));
    }

    public function testModeExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        mode();
    }

    public function testModeDiscrete()
    {
        // Single mode
        $this->assertEquals([20], mode_discrete([10, 20, 30], [2, 5, 3]));

        // Bimodal
        $this->assertEquals([10, 30], mode_discrete([10, 20, 30], [5, 2, 5]));

        // Unsorted input
        $this->assertEquals([30], mode_discrete([30, 10, 20], [5, 2, 3]));

        // Notebook example: Phone shop  model name and units sold
        // Samsung(f=15), iPhone(f=10), Nokia(f=10) => Mode = Samsung (highest freq)
        // Note: values must be numeric for mode_discrete
        // Samsung=1, iPhone=2, Nokia=3 (numeric mapping)
        $this->assertEquals([1], mode_discrete([1, 2, 3], [15, 10, 10]));
    }

    public function testModeDiscreteExceptionMismatchedArrays()
    {
        $this->expectException(\Exception::class);
        mode_discrete([1, 2], [1]);
    }

    public function testModeDiscreteExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        mode_discrete([], []);
    }

    public function testModeDiscreteExceptionZeroTotalFrequency()
    {
        $this->expectException(\Exception::class);
        mode_discrete([1, 2], [0, 0]);
    }

    public function testModeContinuous()
    {
        // Intervals: 0-10 (f=2), 10-20 (f=5), 20-30 (f=3)
        // Modal class: 10-20 (f1=5, f0=2, f2=3, h=10)
        // Mode = 10 + ((5-2)/(2*5-2-3))*10 = 10 + (3/5)*10 = 16
        $this->assertEqualsWithDelta(16, mode_continuous([0, 10, 20], [10, 20, 30], [2, 5, 3]), 0.0001);

        // Unsorted input — result should be same
        $this->assertEqualsWithDelta(16, mode_continuous([20, 0, 10], [30, 10, 20], [3, 2, 5]), 0.0001);

        // Notebook example: Car wash peak traffic time
        // Intervals: 0-10(f=3), 10-20(f=8), 20-30(f=5), 30-40(f=2)
        // Modal class: 10-20 (f1=8, f0=3, f2=5, h=10)
        // Mode = 10 + ((8-3)/(2*8-3-5))*10 = 10 + (5/8)*10 = 10 + 6.25 = 16.25
        $this->assertEqualsWithDelta(
            16.25,
            mode_continuous([0, 10, 20, 30], [10, 20, 30, 40], [3, 8, 5, 2]),
            0.001
        );
    }

    public function testModeContinuousExceptionMismatchedArrays()
    {
        $this->expectException(\Exception::class);
        mode_continuous([0, 10], [10, 20], [1]);
    }

    public function testModeContinuousExceptionEmpty()
    {
        $this->expectException(\Exception::class);
        mode_continuous([], [], []);
    }

    public function testModeContinuousExceptionZeroTotalFrequency()
    {
        $this->expectException(\Exception::class);
        mode_continuous([0, 10], [10, 20], [0, 0]);
    }

    public function testGreatestCommonDivisor()
    {
        $this->assertEquals(8, gcd(24, 16));
        $this->assertEquals(5, gcd(10, 5));
        $this->assertEquals(25, gcd(100, 75));
        $this->assertEquals(6, gcd(12, 18));
        $this->assertEquals(5, gcd(10, 15));
        $this->assertEquals(3, gcd(9, 12));
    }

    public function testPerfectNumber()
    {
        $this->assertTrue(perfect_number(6));
        $this->assertTrue(perfect_number(28));
        $this->assertTrue(perfect_number(496));

        $this->assertFalse(perfect_number(10));
        $this->assertFalse(perfect_number(15));

        $this->assertFalse(perfect_number(-6));
        $this->assertFalse(perfect_number(0));
        $this->assertFalse(perfect_number(1));
        $this->assertFalse(perfect_number(2.5));
        $this->assertFalse(perfect_number("string"));
    }

    public function testFastInverseSquareRoot()
    {
        $this->assertEqualsWithDelta(0.31568579235273, fastInvSqrt(10), 0.00001);
        $this->assertEqualsWithDelta(0.49915357479239, fastInvSqrt(4), 0.00001);
    }
}
