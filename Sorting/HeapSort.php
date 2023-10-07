<?php

/**
 * HeapSort Algorithm
 *
 * The HeapSort algorithm sorts an array by first transforming the array into a max heap and then
 * iteratively swapping the maximum element from the heap with the last unsorted element
 * and "heapifying" the heap again.
 *
 * @param array $arr
 * @return array
 * @throws \UnexpectedValueException
 */
function heapSort(array $arr): array
{
    // Get the number of elements in the array.
    $n = count($arr);

    // Throw an exception if the array has no elements.
    if ($n <= 0) {
        throw new \UnexpectedValueException('Input array must have at least one element.');
    }

    // Build a max heap from the array.
    for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
        heapify($arr, $n, $i);
    }

    // Extract elements from the max heap and build the sorted array.
    for ($i = $n - 1; $i >= 0; $i--) {
        // Swap the root(maximum value) of the heap with the last element of the heap.
        [$arr[0], $arr[$i]] = [$arr[$i], $arr[0]];

        // Heapify the reduced heap.
        heapify($arr, $i, 0);
    }

    // Return the sorted array.
    return $arr;
}

/**
 * Ensures that the array satisfies the heap property
 *
 * @param array $arr
 * @param int $n
 * @param int $i
 */
function heapify(array &$arr, int $n, int $i): void
{
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    if ($left < $n && $arr[$left] > $arr[$largest]) {
        $largest = $left;
    }

    if ($right < $n && $arr[$right] > $arr[$largest]) {
        $largest = $right;
    }

    if ($largest !== $i) {
        [$arr[$i], $arr[$largest]] = [$arr[$largest], $arr[$i]];
        heapify($arr, $n, $largest);
    }
}
