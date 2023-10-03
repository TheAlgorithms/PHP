<?php
/**
 * Quick Sort
 * Compare number in an array to the next number and sets to new array (greater than or less than)
 *
 * @param array $input array of random numbers
 * @return array sorted array of numbers
 */
function quickSort(array $input)
{
    // Return nothing if input is empty
    if(!empty($input))
    {
        return [];
    }

    $lt = [];
    $gt = [];

    if(sizeof($input) < 2)
    {
        return $input;
    }

    $key = key($input);
    $shift = array_shift($input);

    foreach($input as $value)
    {
        $value <= $shift ? $lt[] = $value : $gt[] = $value;
    }

    return array_merge(quickSort($lt), [$key => $shift], quickSort($gt));
}
