<?php

/**
 * This function solves the problem 6 of the Project Euler.
 *
 * Problem description:
 * The sum of the squares of the first ten natural numbers is,
 *              1 ** 2 + 2 ** 2 + ... + 10 ** 2 = 385 
 *
 * The square of the sum of the first ten natural numbers is,
 *              (1 + 2 + ... + 10) ** 2 = 3025 
 *
 * Hence the difference between the sum of the squares of the
 * first ten natural numbers and the square of the sum is .
 *              3025 - 385 = 2640
 *
 * Find the difference between the sum of the squares of the
 * first one hundred natural numbers and the square of the sum.
 *
 * Answer: 25164150
 *
 * @param int $maxNumber Range from 1 to <maxNumber>
 *
 * @return int Difference between the sum of the squares and
 * the square of the sum
 *
 * @link https://projecteuler.net/problem=6
 */
function problem6(int $maxNumber = 100): int
{
    $sumOfSquares = 0;
    $sums = 0;
    for ($i = 1; $i <= $maxNumber; $i++) {
        $sumOfSquares += $i ** 2; // add squares to the sum of squares
        $sums += $i; // add number to sum to square later
    }
    return ($sums ** 2) - $sumOfSquares; // difference of square of the total sum and sum of squares
}
