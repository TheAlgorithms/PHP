<?php

/**
 * Merge Sort
 *
 * @param array $arr
 * @return array
 */
function mergeSort(array $arr)
{
    if (count($arr) <= 1)
    {
      return $arr;
    }

    $mid = floor(count($arr) / 2);
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));

    return merge($left,$right);
}

/**
 * @param array $arr1
 * @param array $arr2
 * @return array
 */
function merge(array $arr1, array $arr2)
{
    $result=[];
    $i=0;
    $j=0;

    while ($i<count($arr1)&&$j<count($arr2))
    {
        if ($arr2[$j]>$arr1[$i]) {
            $result[]=$arr1[$i];
            $i++;
        } else {
            $result[] = $arr2[$j];
            $j++;
        }
    }

    while ($i < count($arr1))
    {
        $result[]=$arr1[$i];
        $i++;
    }

    while ($j<count($arr2))
    {
        $result[] = $arr2[$j];
        $j++;
    }

    return $result;
}



