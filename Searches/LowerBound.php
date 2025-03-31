<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Utils/ArrayHelpers.php';

/**
 * Lower Bound of an element is minimum index that an element would be placed
 * if it is added into that sorted array
 *
 * [C++ Lower Bound](http://www.cplusplus.com/reference/algorithm/lower_bound/)
 *
 * It is assumed that an integer array is provided
 * and the second parameter is also an integer
 *
 * @param array  $array  of sorted integers
 * @param integer  $element  whose lower bound is to be found
 *
 * @return int the index of lower bound of the given element
 */
function lowerBound(array $array, int $element): int
{
    isSortedAscendingInts($array);
    $high = count($array);
    $low = 0;

    while ($low < $high) {
        $mid = $low + floor(($high - $low) / 2);

        if ($array[$mid] < $element) {
            $low = $mid + 1;
        } else {
            $high = $mid;
        }
    }

    return $low;
}
