<?php

declare(strict_types=1);

/**
 * This function calculates
 * The median value of
 * numbers provided
 *
 * @param  decimal  $numbers  A variable sized number input
 * @return decimal $median Median of provided numbers
 * @throws \Exception
 */
function median(...$numbers): float|int|\decimal
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find mean value');
    }

    sort($numbers);
    $length = count($numbers);
    $middle = ceil($length / 2);
    if ($length % 2 == 0) {
        return ($numbers[$middle] + $numbers[$middle - 1]) / 2;
    }

    return $numbers[$middle - 1];
}
