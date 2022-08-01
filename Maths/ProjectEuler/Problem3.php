<?php

/**
 * Problem:
 *
 * The prime factors of 13195 are 5, 7, 13 and 29.
 *
 * What is the largest prime factor of the number 600851475143?
 *
 *
 * Answer:
 *
 * 6857
 *
 *
 * @link https://projecteuler.net/problem=3
 */

/**
 * @return int
 */
function problem3(): int
{
    $n = 600851475143;
    $i = 2;
    while ($i * $i < $n) {
        while ($n % $i == 0) {
            $n /= $i;
        }
        $i++;
    }

    return $n;
}
