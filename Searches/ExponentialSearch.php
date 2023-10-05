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
 * @param  Array  $arr
 * @param  int  $value
 * @param  int  $floor
 * @param  int  $ceiling
 * @return int
 **/
function binarySearch($arr, $value, $floor, $ceiling)
{
    // Get $middle index
    $mid = floor(($floor + $ceiling) / 2);

    // Return position if $value is at the $mid position
    if ($arr[$mid] === $value) {
        return (int) $mid;
    }

    //Return -1 is range is wrong
    if ($floor > $ceiling) {
        return -1;
    }

    // search the left part of the $array
    // If the $middle element is greater than the $value
    if ($arr[$mid] > $value) {
        return binarySearch($arr, $value, $floor, $mid - 1);
    } else {     // search the right part of the $array If the $middle element is lower than the $value
        return binarySearch($arr, $value, $mid + 1, $ceiling);
    }
}

/**
 * @param  Array  $arr
 * @param  int  $value
 * @return int
 */
function exponentialSearch($arr, $value)
{
    // If $value is the first element of the $array return this position
    if ($arr[0] === $value) {
        return 0;
    }

    // Find range for binary search
    $i = 1;
    $length = count($arr);
    while ($i < $length && $arr[$i] <= $value) {
        $i = $i * 2;
    }
    $floor = $i / 2;
    $ceiling = min($i, $length);

    // Call binary search for the range found above
    return binarySearch($arr, $value, $floor, $ceiling);
}
