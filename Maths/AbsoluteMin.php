<?php

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
