<?php

declare(strict_types=1);

/**
 * Gnome Sort
 * References:
 * https://www.geeksforgeeks.org/gnome-sort-a-stupid-one/
 *
 * The Gnome algorithm works by locating the first instance in which two adjoining elements are arranged incorrectly and swaps with each other.
 *
 * @param array $array refers to the array to be sorted
 */
function gnomeSort(array $array): array
{
    $a = 1;
    $b = 2;

    while ($a < count($array)) {
        if ($array[$a - 1] <= $array[$a]) {
            $a = $b;
            $b++;
        } else {
            [$array[$a], $array[$a - 1]] = [$array[$a - 1], $array[$a]];
            $a--;
            if ($a == 0) {
                $a = $b;
                $b++;
            }
        }
    }

    return $array;
}
