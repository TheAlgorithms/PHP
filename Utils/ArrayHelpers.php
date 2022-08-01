<?php

/**
 * @param an array of integers
 * @return is array sorted in ascending
 */
function isSortedAscendingInts(array $arr): void{
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
