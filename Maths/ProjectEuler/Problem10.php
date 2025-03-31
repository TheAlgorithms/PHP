<?php

/*
 * This function solves the problem 10 of the Project Euler.
 *
 * Problem description:
 * The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 * Find the sum of all the primes below two million.
 */

/**
 * @return int
 */
function problem10(): int
{
    // Using Sieve of Eratosthenes
    // @see https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes

    $number = 2000000;
    $isPrime = [];

    for ($i = 2; $i <= $number; $i++) {
        $isPrime[$i] = $i;
    }

    for ($i = 2; $i * $i <= $number; $i++) {
        if (isset($isPrime[$i])) {
            for ($j = $i; $i * $j <= $number; $j++) {
                unset($isPrime[$i * $j]);
            }
        }
    }

    return array_sum($isPrime);
}
