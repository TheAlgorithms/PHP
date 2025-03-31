<?php

/**
* This function returns true
* if the submitted number is perfect,
* false if it is not.
*
* A perfect number is a positive integer that is
* equal to the sum of its positive proper
* divisors, excluding the number itself.
*
* About perfect numbers: https://en.wikipedia.org/wiki/Perfect_number
*
* @author Marco https://github.com/MaarcooC
* @param int $number
* @return bool
*/
function perfect_number(int $number): bool
{
    if ($number <= 1) {
        return false;
    }

    $divisorsSum = 1;

    // Check for divisors up to the square root of the number
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            $divisorsSum += $i; // add i to the sum of divisors
            if ($i !== $number / $i) { // add the complement divisor
                $divisorsSum += $number / $i;
            }
        }
    }

    return $divisorsSum === $number;
}
