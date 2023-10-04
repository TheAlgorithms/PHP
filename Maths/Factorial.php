<?php

/**
 * This function calculates
 * and returns the factorial
 * of provided positive integer
 * number.
 *
 * @param  Integer  $number  Integer input
 * @return Integer Factorial of the input
 * @throws \Exception
 */
function factorial(int $number)
{
    static $cache = [];
//internal caching memory for speed

    if ($number < 0) {
        throw new \Exception("Negative numbers are not allowed for calculating Factorial");
    }
    if ($number === 0) {
        return 1;
// Factorial of 0 is 1
    }

    if (isset($cache[$number])) {
        return $cache[$number];
    }

    $fact = ($number * factorial($number - 1));
// Recursion since x! = x * (x-1)!
    $cache[$number] = $fact;
    return $fact;
}
