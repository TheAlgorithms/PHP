<?php

/**
 * This function calculates
 * The mean value of
 * numbers provided
 *
 * @param  decimal  $numbers  A variable sized number input
 * @return decimal $mean Mean of provided numbers
 * @throws \Exception
 */
function mean(...$numbers)
{
    if (empty($numbers)) {
        throw new \Exception('Please pass values to find mean value');
    }

    $total = array_sum($numbers);

    return $total / count($numbers);
}
