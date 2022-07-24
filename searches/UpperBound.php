<?php

require_once __DIR__ . '/../../Utils/ArrayHelpers.php';

/**
 * Upper Bound of an element is maximum index that an element would be placed
 * if it is added into that sorted array
 *
 * [C++ Lower Bound](http://www.cplusplus.com/reference/algorithm/upper_bound/)
 *
 * It is assumed that an integer array is provided
 * and the second parameter is also a integer
 *
 * @param array of sorted integers
 * @param integer whose upper bound is to be found
 *
 * @return the index of upper bound of the given element
 */
function upperBound(array $arr, int $elem){
    isSortedAscendingInts($arr);
    $hi = count($arr);
    $lo = 0;

    while($lo < $hi){
        $mid = $lo + floor(($hi - $lo)/2);

        if($arr[$mid] <= $elem){
            $lo = $mid + 1;
        }else{
            $hi = $mid;
        }
    }

    return $lo;
}
