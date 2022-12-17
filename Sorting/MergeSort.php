<?php

/**
 * Merge Sort
 *
 * @param array $arr
 * @return array
 */
function mergeSort(array $arr)
{
    if (count($arr) <= 1) {
      return $arr;
    }

    $mid = floor( count($arr) / 2 );
    $leftArray = mergeSort( array_slice($arr, 0, $mid) );
    $rightArray = mergeSort( array_slice($arr, $mid) );

    return merge($leftArray, $rightArray);
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



