<?php

/**
 * This function check whether
 * the provided number is a
 * perfect square or not.
 *
 * @param float $number A decimal input
 * @return boolean whether the number is perfect square or not
 */
function isPerfectSquare(float $number): bool
{
    $root = (int) sqrt($number);
    return (($root * $root) === $number); // If number's square root is an integer then it's a perfect square else not
}
