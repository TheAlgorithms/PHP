<?php

/**
 * Selection Sort
 *
 * @param array $array
 * @return array
 */
function selectionSort(array $array): array
{
    $length = count($array);

    foreach ($array as $i => $value) {
        $lowest = $i;

        for ($j = $i + 1; $j < $length; $j++) {
            if ($array[$j] < $array[$lowest]) {
                $lowest = $j;
            }
        }

        if ($i !== $lowest) {
            $temp = $value;
            $array[$i] = $array[$lowest];
            $array[$lowest] = $temp;
        }
    }

    return $array;
}
