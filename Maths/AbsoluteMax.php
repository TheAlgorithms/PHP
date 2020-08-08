<?php

function absolute_max(...$numbers)
{
    if (empty($numbers)) {
        throw new \Exception('Please pass values to find absolute max value');
    }

    $absoluteMax = $numbers[0];
    for ($loopIndex = 0; $loopIndex < count($numbers); $loopIndex++) {
        if ($numbers[$loopIndex] > $absoluteMax) {
            $absoluteMax = $numbers[$loopIndex];
        }
    }

    return $absoluteMax;
}
