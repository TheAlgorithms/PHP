<?php

/**
 * This function calculates
 * The mean value of
 * numbers provided
 *
 * @param array $numbers  A variable sized number input
 * @return float $mean Mean of provided numbers
 * @throws Exception
 */
function mean(...$numbers): float
{
    if (empty($numbers)) {
        throw new RuntimeException('Please pass values to find mean value');
    }

    $total = array_sum($numbers);

    return $total / count($numbers);
}
