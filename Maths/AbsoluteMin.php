<?php

/**
 * This function calculates
 * Absolute min values from
 * the different numbers
 * provided.
 *
 * @param  decimal  $numbers  A variable sized number input
 * @return decimal $absoluteMin Absolute min value
 * @throws \Exception
 */
function absolute_min(...$numbers)
{
    if (empty($numbers)) {
        throw new \Exception('Please pass values to find absolute min value');
    }

    $absoluteMin = $numbers[0];
    for ($loopIndex = 0; $loopIndex < count($numbers); $loopIndex++) {
        if ($numbers[$loopIndex] < $absoluteMin) {
            $absoluteMin = $numbers[$loopIndex];
        }
    }

    return $absoluteMin;
}
