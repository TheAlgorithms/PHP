<?php

require_once __DIR__ . '/../../Utils/ArrayHelpers.php';

/**
 * Lower Bound of an element is minimum index that an element would be placed
 * if it is added into that sorted array
 *
 * [C++ Lower Bound](http://www.cplusplus.com/reference/algorithm/lower_bound/)
 *
 * It is assumed that an integer array is provided
 * and the second parameter is also a integer
 *
 * @param array of sorted integers
 * @param integer whose lower bound is to be found
 *
 * @return the index of lower bound of the given element
 */
function lowerBound(array $arr, int $elem){
    isSortedAscendingInts($arr);
    $hi = count($arr);
    $lo = 0;

    while($lo < $hi){
        $mid = $lo + floor(($hi - $lo)/2);

        if($arr[$mid] < $elem){
            $lo = $mid+1;
        }else{
            $hi = $mid;
        }
    }

    return $lo;
}
