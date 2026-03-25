<?php

declare(strict_types=1);

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
        $counter = count($nums);

        for ($i = 0; $i < $counter; $i++) {
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
 */
function getDigit($num, $i): int
{
    return floor(abs($num) / 10 ** $i) % 10;
}

/**
 * Get the digits count
 *
 * @param $num
 * @return int
 */
function digitsCount($num): int|float
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
    $counter = count($arr);

    for ($i = 0; $i < $counter; $i++) {
        $maxDigits = max($maxDigits, digitsCount($arr[$i]));
    }

    return $maxDigits;
}

/**
 * Concat the array
 */
function concat(array $array): array
{
    $newArray = [];
    $counter = count($array);

    for ($i = 0; $i < $counter; $i++) {
        for ($j = 0; $j < count($array[$i]); $j++) {
            $newArray[] = $array[$i][$j];
        }
    }

    return $newArray;
}
