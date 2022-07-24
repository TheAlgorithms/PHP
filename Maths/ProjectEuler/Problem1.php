<?php

/**
 * Problem:
 *
 * If we list all the natural numbers below 10 that are multiples of 3 or 5,
 * we get 3, 5, 6 and 9. The sum of these multiples is 23.
 *
 * Find the sum of all the multiples of 3 or 5 below 1000.
 *
 *
 * Answer:
 *
 * 233168
 *
 *
 * @link https://projecteuler.net/problem=1
 */

/**
 * @return int
 */
function problem1a(): int
{
    $maxNumber = 999; // below 1000

    $numbers = range(1, $maxNumber);

    return array_reduce($numbers, function($carry, $number) {
        $shouldCarry = $number % 3 == 0 || $number % 5 == 0;
        return $carry += $shouldCarry ? $number : 0;
    });
}

/**
 * @return int
 */
function problem1b(): int
{
    $maxNumber = 999; // below 1000

    $numbersMultByThree = range(3, $maxNumber, 3);
    $numbersMultByFive = range(5, $maxNumber, 5);

    $numbers = array_merge($numbersMultByThree, $numbersMultByFive);

    return array_sum(array_unique($numbers));
}
