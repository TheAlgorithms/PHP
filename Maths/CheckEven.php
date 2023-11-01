<?php
/**
 * This function checks whether the provided integer is even.
 * e.g. 2
 * @param int $number An integer input
 * @return bool Returns true if the number is even, false otherwise.
 */
function isEven(int $number)
{
    return ($number & 1) === 0;
}
