<?php

/**
 * Radix Sort
 *
 * @param $nums
 * @return array
 */
function radixSort($nums)
{
    $maxDigitsCount = maxDigits($nums);
    for ($k = 0; $k < $maxDigitsCount; $k++) {
        $digitBucket = array_fill(0, 10, []);

        for ($i = 0; $i < count($nums); $i++) {
            $digitBucket[getDigit($nums[$i], $k)][] = $nums[$i];
        }

        $nums = concat($digitBucket);
    }

    return $nums;
}


/*
 * Helper functions
 */


/**
 * Get the digits value by it's place
 *
 * @param $num
 * @param $i
 * @return int
 */
function getDigit($num, $i)
{
    return floor(abs($num) / pow(10, $i)) % 10;
}

/**
 * Get the digits count
 *
 * @param $num
 * @return int
 */
function digitsCount($num)
{
    if ($num == 0) {
        return 1;
    }
    return floor(log10(abs($num))) + 1;
}

/**
 * Get the max digits count
 *
 * @param $arr
 * @return int
 */
function maxDigits($arr)
{
    $maxDigits = 0;

    for ($i = 0; $i < count($arr); $i++) {
        $maxDigits = max($maxDigits, digitsCount($arr[$i]));
    }

    return $maxDigits;
}

/**
 * Concat the array
 *
 * @param  array  $array
 * @return array
 */
function concat(array $array)
{
    $newArray = [];

    for ($i = 0; $i < count($array); $i++) {
        for ($j = 0; $j < count($array[$i]); $j++) {
            $newArray[] = $array[$i][$j];
        }
    }
    return $newArray;
}
