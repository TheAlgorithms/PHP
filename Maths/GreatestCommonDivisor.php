<?php

declare(strict_types=1);

/**
 * This function finds the greatest common division using Euclidean algorithm
 * example: gcd(30, 24) => 6
 */
function gcd(int $a, int $b): int
{
    if ($b == 0) {
        return $a;
    }

    return gcd($b, $a % $b);
}
