<?php

/*
 * Bubble Sort
 *
 * Compare numbers in an array 2 at a time and switch them if the second number is smaller
 *
 * @param array $input array of random numbers
 * @return array sorted array of numbers
 */
function bubbleSort2(array $input)
{
    // Return nothing if input is empty
    if (!isset($input)) {
        return [];
    }

    do {
        $swapped = false;

        for ($i = 0, $count = sizeof($input) - 1; $i < $count; $i++) {
            if ($input[$i + 1] < $input[$i]) {
                list($input[$i + 1], $input[$i]) = [$input[$i], $input[$i + 1]];
                $swapped = true;
            }
        }
    } while ($swapped);
    return $input;
}
