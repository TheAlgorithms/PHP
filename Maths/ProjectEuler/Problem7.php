<?php

/**
 * This function solves the problem 7 of the Project Euler.
 *
 * Problem description:
 * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
 * What is the 10 001st prime number?
 */
function problem7(): int
{
    $numberOfPrimes = 0;
    $number = 0;
    while ($numberOfPrimes < 10001) {
        $number++;
        if (isPrime($number)) {
            $numberOfPrimes++;
        }
    }
    return $number;
}
