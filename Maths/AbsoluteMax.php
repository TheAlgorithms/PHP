<?php

/**
 * This function calculates
 * Absolute max values from
 * the different numbers
 * provided
 *
 * @param array $numbers  A variable sized number input
 * @return int $absoluteMax Absolute max value
 * @throws Exception
 */
function absolute_max(...$numbers): int
{
    if (empty($numbers)) {
        throw new RuntimeException('Please pass values to find absolute max value');
    }

    $absoluteMax = $numbers[0];
    foreach ($numbers as $number) {
        if ($number > $absoluteMax) {
            $absoluteMax = $number;
        }
    }

    return $absoluteMax;
}
