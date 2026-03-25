<?php

declare(strict_types=1);

/**
 * This function calculates
 * Absolute max values from
 * the different numbers
 * provided
 *
 * @param  decimal  $numbers  A variable sized number input
 * @return decimal $absoluteMax Absolute max value
 * @throws \Exception
 */
function absolute_max(...$numbers)
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find absolute max value');
    }

    $absoluteMax = $numbers[0];
    $counter = count($numbers);
    for ($loopIndex = 0; $loopIndex < $counter; $loopIndex++) {
        if ($numbers[$loopIndex] > $absoluteMax) {
            $absoluteMax = $numbers[$loopIndex];
        }
    }

    return $absoluteMax;
}
