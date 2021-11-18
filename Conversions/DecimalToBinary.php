<?php

/**
 * Recursive function to convert a binary number to decimal
 * 
 * @param int $dec number to convert
 * @return string
 */
function decToBin(int $dec, string $result = "")
{
    if($dec == 0) return $result;

    $result = (string)($dec % 2) . $result;
    return decToBin($dec / 2, $result);
}

print decToBin(200);