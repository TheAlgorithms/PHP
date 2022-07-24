<?php

/**
 * @param an array of integers
 * @return is array sorted in ascending
 */
function array_check(array $arr): void{
    $len = count($arr);
    if($len == 0){
        return;
    }
    if(!is_int($arr[0])){
        throw UnexpectedValueException;
    }
    for($i = 1; $i < $len; $i++){
        // a sorted array is expected
        if(!is_int($arr[$i]) && $arr[$i] < $arr[$i-1]){
           throw UnexpectedValueException;
        }
    }
}


/**
 * Lower Bound of an element is minimum index that an element would be placed 
 * if it is added into that sorted array
 * 
 * [C++ Lower Bound](http://www.cplusplus.com/reference/algorithm/lower_bound/)
 * 
 * It is assumed that an integer array is provided
 * and the second parameter is also a integer
 * 
 * @param array of integers
 * @param integer whose lower bound is to be found
 * 
 * @return the index of lower bound of the given element
 */
function lower_bound(array $arr, int $elem){
    // array must be sorted
    // and all elemets must be integers
    array_check($arr);
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

// test code
$arr = array(1,2,3,3,3,4,5);
$i = lower_bound($arr, 3);
print $i;