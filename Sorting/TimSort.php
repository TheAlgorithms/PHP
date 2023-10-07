<?php

/**
 * Tim Sort
 * 
 * @param array $input array of random numbers
 * @return array sorted array of numbers
 */
function timSort(array $input)
{
    $length = count($input);
    $runs = [];
    $sorted_runs = [];
    $new_run = [$input[0]];
    $sorted_array = [];
    $i = 1;

    while ($i < $length) {
        if ($input[$i] < $input[$i - 1]) {
            $runs[] = $new_run;
            $new_run = [$input[$i]];
        } else {
            $new_run[] = $input[$i];
        }

        $i++;
    }

    $runs[] = $new_run;
    

    foreach ($runs as $run) {
        $sorted_runs[] = insertionSort($run);
    }

    foreach ($sorted_runs as $run) {
        $sorted_array = merge($sorted_array, $run);
    }

    return $sorted_array;
}

/**
 * Bynary Search
 * 
 * @param array $input
 * @param int $value
 * @return int
 */
function binarySearch(array $input, int $value, int $left, int $right)
{
    if ($right < $left) {
        return -1;
    }

    $mid = floor(($left + $right) / 2);

    if ($input[$mid] > $value) {
        return binarySearch($input, $value, $left, $mid - 1);
    } elseif ($input[$mid] < $value) {
        return binarySearch($input, $value, $mid + 1, $right);
    } else {
        return $mid;
    }
}

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

/**
 * @param array $leftArray
 * @param array $rightArray
 * @return array
 */
function merge(array $leftArray, array $rightArray)
{
    $result = [];
    $i = 0;
    $j = 0;

    while ($i < count($leftArray) && $j < count($rightArray)) {
        if ($rightArray[$j] > $leftArray[$i]) {
            $result[] = $leftArray[$i];
            $i++;
        } else {
            $result[] = $rightArray[$j];
            $j++;
        }
    }

    while ($i < count($leftArray)) {
        $result[] = $leftArray[$i];
        $i++;
    }

    while ($j < count($rightArray)) {
        $result[] = $rightArray[$j];
        $j++;
    }

    return $result;
}
