<?php

/**
 * Calculate the fast inverse square root of a number.
 *
 * This function computes the fast inverse square root of a floating-point number
 * using the famous Quake III algorithm, originally developed by id Software.
 *
 * @param float $x The input number for which to calculate the inverse square root.
 * @return float The fast inverse square root of the input number.
 */
function fastInvSqrt($x)
{
    // Convert the input float to an integer
    $i = unpack('l', pack('f', $x))[1];
    // Apply the bit manipulation magic number
    $i = 0x5f3759df - ($i >> 1);
    // Convert the integer back to a float
    $y = unpack('f', pack('l', $i))[1];
    // Perform the final calculation
    return $y * (1.5 - 0.5 * $x * $y * $y);
}
