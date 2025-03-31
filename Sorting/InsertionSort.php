<?php

/**
 * Insertion Sort
 *
 * @param array $array
 * @return array
 */
function insertionSort(array $array): array
{
    $count = count($array);
    for ($i = 1; $i < $count; $i++) {
        $currentValue = $array[$i];

        for ($j = $i - 1; $j >= 0 && $array[$j] > $currentValue; $j--) {
            $array[$j + 1] = $array[$j];
        }

        $array[$j + 1] = $currentValue;
    }

    return $array;
}
