<?php
/**
 * This function check whether
 * the provided number is a
 * perfect square or not.
 *
 * @param Decimal $number A decimal input
 * @return boolean whether the number is perfect square or not
 */
function is_perfect_square($number)
{
    $root = (int) sqrt($number);
    return (($root * $root) === $number); // If number's square root is an integer then it's a perfect square else not
}
