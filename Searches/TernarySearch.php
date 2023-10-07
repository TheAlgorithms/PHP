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
    // Return null if high is less than low (base case: key not found).
    if ($high < $low) {
        return null;
    }

    // Calculate the indices of the first and second midpoints.
    $mid1 = floor($low + ($high - $low) / 3);
    $mid2 = floor($high - ($high - $low) / 3);

    // Check if key is located at either midpoint.
    if ($arr[$mid1] === $key) {
        return $mid1;
    }

    if ($arr[$mid2] === $key) {
        return $mid2;
    }

    // Determine which section to continue searching in.
    if ($key < $arr[$mid1]) {
        // Key is in the left section, between $low and $mid1.
        return ternarySearchByRecursion($arr, $key, $low, $mid1 - 1);
    } elseif ($key > $arr[$mid2]) {
        // Key is in the right section, between $mid2 and $high.
        return ternarySearchByRecursion($arr, $key, $mid2 + 1, $high);
    } else {
        // Key is in the middle section, between $mid1 and $mid2.
        return ternarySearchByRecursion($arr, $key, $mid1 + 1, $mid2 - 1);
    }
}

function ternarySearchIterative($arr, $key)
{
    // Initialize low and high pointers.
    $low = 0;
    $high = count($arr) - 1;

    // Continue searching while the high pointer is greater than or equal to the low pointer.
    while ($high >= $low) {
        // Calculate the first and second midpoints.
        $mid1 = floor($low + ($high - $low) / 3);
        $mid2 = floor($high - ($high - $low) / 3);

        // Check if the key is found at either midpoint.
        if ($arr[$mid1] === $key) {
            return $mid1;
        }

        if ($arr[$mid2] === $key) {
            return $mid2;
        }

        // Determine the section to continue the search in.
        if ($key < $arr[$mid1]) {
            // Key is in the left section, update the high pointer.
            $high = $mid1 - 1;
        } elseif ($key > $arr[$mid2]) {
            // Key is in the right section, update the low pointer.
            $low = $mid2 + 1;
        } else {
            // Key is in the middle section, update both pointers.
            $low = $mid1 + 1;
            $high = $mid2 - 1;
        }
    }

    // Key was not found.
    return null;
}
