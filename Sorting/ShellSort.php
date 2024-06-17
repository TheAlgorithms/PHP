<?php

/**
 * Shell Sort
 * This function sorts an array in ascending order using the Shell Sort algorithm.
 * Time complexity of the Shell Sort algorithm depends on the gap sequence used.
 * With Knuth's sequence, the time complexity is O(n^(3/2)).
 *
 *
 * @param array $array
 * @return array
 */

function shellSort(array $array): array
{
    $length = count($array);
    $series = calculateKnuthSeries($length);

    foreach ($series as $gap) {
        for ($i = $gap; $i < $length; $i++) {
            $temp = $array[$i];
            $j = $i;

            while ($j >= $gap && $array[$j - $gap] > $temp) {
                $array[$j] = $array[$j - $gap];
                $j -= $gap;
            }

            $array[$j] = $temp;
        }
    }

    return $array;
}

/**
 * Calculate Knuth's series
 *
 * @param int $n Size of the array
 * @return array
 */
function calculateKnuthSeries(int $n): array
{
    $h = 1;
    $series = [];

    while ($h < $n) {
        array_unshift($series, $h);
        $h = 3 * $h + 1;
    }

    return $series;
}
