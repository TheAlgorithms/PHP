<?php

/*
 * Exponential Search Algorithm
 *
 * The algorithm consists of two stages.
 * The first stage determines a range in which the search key would reside
 **** if it were in the list.
 * In the second stage, a binary search is performed on this range.
 */

/**
 * @param Array $array
 * @param int $value
 * @param int $floor
 * @param int $ceiling
 * @return int
 **/
function binarySearch(array $array, int $value, int $floor, int $ceiling): int
{
    // Get $middle index
    $mid = floor(($floor + $ceiling) / 2);

    // Return position if $value is at the $mid position
    if ($array[$mid] === $value) {
        return (int) $mid;
    }

    //Return -1 is range is wrong
    if ($floor > $ceiling) {
        return -1;
    }

    // search the left part of the $array
    // If the $middle element is greater than the $value
    if ($array[$mid] > $value) {
        return binarySearch($array, $value, $floor, $mid - 1);
    }

    // search the right part of the $array If the $middle element is lower than the $value
    return binarySearch($array, $value, $mid + 1, $ceiling);
}

/**
 * @param Array $array
 * @param int $value
 * @return int
 */
function exponentialSearch(array $array, int $value): int
{
    // If $value is the first element of the $array return this position
    if ($array[0] === $value) {
        return 0;
    }

    // Find range for binary search
    $i = 1;
    $length = count($array);
    while ($i < $length && $array[$i] <= $value) {
        $i *= 2;
    }
    $floor = $i / 2;
    $ceiling = min($i, $length);

    // Call binary search for the range found above
    return binarySearch($array, $value, $floor, $ceiling);
}
