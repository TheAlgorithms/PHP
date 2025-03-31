<?php

/**
 * Radix Sort
 *
 * @param array $numbers
 * @return array
 */
function radixSort(array $numbers): array
{
    $maxDigitsCount = maxDigits($numbers);
    for ($k = 0; $k < $maxDigitsCount; $k++) {
        $digitBucket = array_fill(0, 10, []);

        foreach ($numbers as $number) {
            $digitBucket[getDigit($number, $k)][] = $number;
        }

        $numbers = concat($digitBucket);
    }

    return $numbers;
}


/*
 * Helper functions
 */


/**
 * Get the digits value by its place
 *
 * @param $number
 * @param $i
 * @return int
 */
function getDigit($number, $i): int
{
    return floor(abs($number) / (10 ** $i)) % 10;
}

/**
 * Get the digits count
 *
 * @param $num
 * @return int
 */
function digitsCount($num): int
{
    if ($num === 0) {
        return 1;
    }
    return floor(log10(abs($num))) + 1;
}

/**
 * Get the max digits count
 *
 * @param $array
 * @return int
 */
function maxDigits($array): int
{
    $maxDigits = 0;

    foreach ($array as $value) {
        $maxDigits = max($maxDigits, digitsCount($value));
    }

    return $maxDigits;
}

/**
 * Concat the array
 *
 * @param  array  $array
 * @return array
 */
function concat(array $array): array
{
    $newArray = [];

    foreach ($array as $iValue) {
        foreach ($iValue as $jValue) {
            $newArray[] = $jValue;
        }
    }
    return $newArray;
}
