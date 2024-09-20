<?php

/**
 * This function checks whether
 * the provided integer is odd.
 *
 * @param int $number An integer input
 * @return bool whether the number is odd or not
 */
function isOdd(int $number): bool
{
    return $number % 2 !== 0;
}
