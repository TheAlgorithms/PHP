<?php
/**
 * This function calculates
 * The median value of
 * numbers provided
 * 
 * @param decimal $numbers A variable sized number input
 * @return decimal $median Median of provided numbers
 */
function median(...$numbers)
{
    if (empty($numbers)) {
        throw new \Exception('Please pass values to find mean value');
    }

    sort($numbers);
    $length = count($numbers);
    
    $middle = $length >> 1;
    $median = ($numbers[$middle] + $numbers[$middle - 1]) / 2;
    return $median;
}