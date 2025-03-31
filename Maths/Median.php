<?php

/**
 * This function calculates
 * The median value of
 * numbers provided
 *
 * @param  array  $numbers  A variable sized number input
 * @return float|int $median Median of provided numbers
 * @throws Exception
 */
function median(...$numbers)
{
    if (empty($numbers)) {
        throw new RuntimeException('Please pass values to find mean value');
    }

    sort($numbers);
    $length = count($numbers);
    $middle = ceil($length / 2);
    if ($length % 2 === 0) {
        return ($numbers[$middle] + $numbers[$middle - 1]) / 2;
    }

    return $numbers[$middle - 1];
}
