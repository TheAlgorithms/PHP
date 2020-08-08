<?php

function factorial(int $number)
{
    if ($number < 0) {
        throw new \Exception("Negative numbers are not allowed for calculating Factorial");
    }
    if ($number === 0) {
        return 1; // Factorial of 0 is 1
    }
    return ($number * factorial($number - 1)); // Recursion since x! = x * (x-1)!
}
