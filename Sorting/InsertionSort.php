<?php

/**
 * Insertion Sort
 *
 * @param array $array
 * @return array
 */
function insertionSort(array $array)
{
    for ($i = 1; $i < count($array); $i++) {
        $currentVal = $array[$i];

        for ($j = $i - 1; $j >= 0 && $array[$j] > $currentVal; $j--) {
            $array[$j + 1] = $array[$j];
        }

        $array[$j + 1] = $currentVal;
    }

    return $array;
}
