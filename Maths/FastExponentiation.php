<?php

/**
 * This functions computes an exponent by doing repeated squares
 *
 * @param Integer $base the base
 * @param Integer $exponent the exponent (ie the number of times that the base is multiplied by itself)
 * @return Integer
 */
function fastExponentiation(int $base, int $exponent)
{
    if ($exponent == 0) {
        return 1;
    }

    if ($exponent == 1) {
        return $base;
    }

    if ($exponent % 2 == 0) {
        return fastExponentiation($base * $base, $exponent / 2);
    } else {
        return $base * fastExponentiation($base * $base, ($exponent - 1) / 2);
    }
}
