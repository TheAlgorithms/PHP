<?php

/**
 * This function calculates
 * Absolute min values from
 * the different numbers
 * provided.
 *
 * @param array $numbers  A variable sized number input
 * @return int $absoluteMin Absolute min value
 * @throws Exception
 */
function absolute_min(...$numbers): int
{
    if (empty($numbers)) {
        throw new RuntimeException('Please pass values to find absolute min value');
    }

    $absoluteMin = $numbers[0];
    foreach ($numbers as $number) {
        if ($number < $absoluteMin) {
            $absoluteMin = $number;
        }
    }

    return $absoluteMin;
}
