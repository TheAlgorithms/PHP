<?php

/**
 * Ternary Search Algorithm 
 * 
 * For more information please refer to this website: https://www.geeksforgeeks.org/ternary-search/
 * 
 * @param array $array
 * @param int $key
 * @param int starting index
 * @param int array index length
 * @return int key index inside the array
 */
function ternarySearch($array, $key, $s, $len)
{
    //if array index length exceeds starting index 
    if ($s > $len) {
        return -1;
    }

    //find the mid1 and mid2
    $mid1 = (int)($s + ($len - $s) / 3);
    $mid2 = (int)($len - ($len - $s) / 3);

    //if the mid1 or mid2 is key
    if ($array[$mid1] == $key) {
        return $mid1;
    }
    if ($array[$mid2] == $key) {
        return $mid2;
    }

    // The key lies in between len and mid1
    if ($key < $array[$mid1]) {
        return ternarySearch($array, $key, $s, $mid1 - 1);

        // The key lies in between mid2 and s
    } else if ($key > $array[$mid2]) {
        return ternarySearch($array, $key, $mid2 + 1, $len);

        // The key lies in between mid1 and mid2
    } else {
        return ternarySearch($array, $key, $mid1 + 1, $mid2 - 1);
    }
}
