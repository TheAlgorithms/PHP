<?php

/**
 * Recursive function to convert a decimal number to binary
 * 
 * @param int $dec number to convert
 * @return string
 */
function decToBin(int $dec, string $result = "")
{
    if($dec == 0) return $result;

    $result = (string)($dec % 2) . $result;
    return (int)decToBin($dec / 2, $result);
}

print decToBin(200);
