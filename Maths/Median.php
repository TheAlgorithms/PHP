<?php

declare(strict_types=1);

/**
 * This function calculates
 * The median value of
 * numbers provided
 *
 * @param  float|int  $numbers  A variable sized number input
 * @return float|int $median Median of provided numbers
 * @throws \Exception
 */
function median(...$numbers): float|int
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find mean value');
    }

    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            throw new \Exception('Please pass numeric values to find median value');
        }
    }

    sort($numbers);
    $length = count($numbers);
    $middle = intdiv($length, 2);
    if ($length % 2 == 0) {
        return ($numbers[$middle] + $numbers[$middle - 1]) / 2;
    }

    return $numbers[$middle] + 0;
}
