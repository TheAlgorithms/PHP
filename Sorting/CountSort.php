<?php

/**
 * Sorts an array of integers using the Counting Sort algorithm.
 *
 * @param array $array The input array to be sorted.
 * @param int $min The minimum value in the input array.
 * @param int $max The maximum value in the input array.
 * @return array The sorted array.
 */
function countSort( $array, $min, $max )
{
    // Create an array to store the count of each element in the input array.
    $count = array();

    // Initialize the count array with zeros for all possible values within the range.
    for ( $i = $min; $i <= $max; $i++ ) {
        $count[$i] = 0;
    }

    // Count the occurrences of each element in the input array.
    foreach ( $array as $number ) {
        $count[$number]++;
    }

    // Initialize an index to track the position in the sorted array.
    $z = 0;

    // Reconstruct the sorted array based on the counts of each element.
    for ( $i = $min; $i <= $max; $i++ ) {
        while ( $count[$i]-- > 0 ) {
            // Assign the current element back to the sorted array.
            $array[ $z++ ] = $i;
        }
    }

    // Return the sorted array.
    return $array;
}
