<?php

/**
 * This function finds the greatest common division using Euclidean algorithm
 * example: gcd(30, 24) => 6
 * @param int $a
 * @param int $b
 * @return int
 */
function gcd(int $a, int $b): int
{
    if ($b == 0) {
        return $a;
    }
    return gcd($b, $a % $b);
}
