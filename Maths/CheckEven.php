<?php

/**
 * This function checks whether
 * the provided integer is even.
 *
 * @param int $number An integer input
 * @return bool whether the number is even or not
 */
function isEven(int $number): bool
{
    return $number % 2 === 0;
}
