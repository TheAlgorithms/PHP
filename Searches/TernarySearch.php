<?php

/* Ternary search is similar to binary search
 * It rather divides the sorted array into three parts rather than.two parts by using two middle points, $mid1  $mid2.
 * The value of the $key will first be compared with the two $mid points, the value will be returned if there is a match.
 * Then, if the value of the $key is less than $mid1, narrow the interval to the first part.
 * Else, if the value of the $key is greater than $mid2, narrow the interval to the third part.
 * Otherwise, narrow the interval to the $middle part.
 * Repeat the steps until the value is found or the interval is empty (value not found after checking all elements).
 */
function ternarySearchByRecursion($arr, $key, $low, $high)
{

    //Return -1 if high lesser than low, we can't find item in the whole array
    if ($high < $low) {
        return null;
    }

    //get $mid1 and $mid2
    $mid1 = floor($low + ($high - $low) / 3);
    $mid2 = floor($high - ($high - $low) / 3);
// check if $key is found at any $mid
    if ($arr[$mid1] === $key) {
// return index of $key if found
        return $mid1;
    }
    if ($arr[$mid2] === $key) {
// return index of $key if found
        return $mid2;
    }

    // since the $key is not found at $mid,
    // check in which region it is present
    // and repeat the Search operation
    // in that region
    if ($key < $arr[$mid1]) {
// the $key lies in between $low and $mid1
        return ternarySearchByRecursion($arr, $key, $low, $mid1 - 1);
    } elseif ($key > $arr[$mid2]) {
    // the $key lies in between $mid2 and $high
        return ternarySearchByRecursion($arr, $key, $mid2 + 1, $high);
    } else {
    // the $key lies in between $mid1 and $mid2
        return ternarySearchByRecursion($arr, $key, $mid1 + 1, $mid2 - 1);
    }
}

function ternarySearchIterative($arr, $key)
{
    $low = 0;
    $high = count($arr) - 1;
    while ($high >= $low) {
    // find the $mid1 and $mid2
        $mid1 = floor($low + ($high - $low) / 3);
        $mid2 = floor($high - ($high - $low) / 3);
    // check if $key is found at any $mid
        if ($arr[$mid1] === $key) {
// return index of $key if found
            return $mid1;
        }
        if ($arr[$mid2] === $key) {
    // return index of $key if found
            return $mid2;
        }

      // since the $key is not found at $mid,
      // check in which region it is present
      // and repeat the Search operation
      // in that region
        if ($key < $arr[$mid1]) {
    // the $key lies in between $low and $mid1
            $high = $mid1 - 1;
        } elseif ($key > $arr[$mid2]) {
        // the $key lies in between $mid2 and $high
            $low = $mid2 + 1;
        } else {
        // the $key lies in between $mid1 and $mid2
            $low = $mid1 + 1;
            $high = $mid2 - 1;
        }
    }
  // the $key was not found
    return null;
}
