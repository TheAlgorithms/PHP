<?php

/**
 * This function solves the problem 9 of the Project Euler.
 *
 * Problem description:
 * A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
 *
 * a^2 + b^2 = c^2
 *
 * For example:
 *
 * 3^2 + 4^2 = 9 + 16 = 25 = 5^2.
 *
 * There exists exactly one Pythagorean triplet for which a + b + c = 1000. Find the product abc.
 */
function problem9(): int
{
    for ($i = 0; $i <= 300; $i++) {
        for ($j = 0; $j <= 400; $j++) {
            $k = 1000 - $i - $j;
            if ($i * $i + $j * $j === $k * $k) {
                return $i * $j * $k;
            }
        }
    }
    return 0;
}
