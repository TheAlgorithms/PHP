<?php
/**
 * This function checks whether the provided integer is odd.
 * e.g. 1
 * @param int $number An integer input
 * @return bool Returns true if the number is odd, false otherwise.
 */
function isOdd(int $number)
{
    return ($number & 1) === 1;
}
