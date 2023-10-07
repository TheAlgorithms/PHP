<?php

/**
 * Bubble Sort
 *
 * @param array $array
 * @return array
 */
function bubbleSort($array)
{
    $length = count($array);

    for ($i = $length; $i > 0; $i--) {
        $swapped = false;

        for ($j = 0; $j < $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
                $swapped = true;
            }
        }

        if (!$swapped) {
            break;
        }
    }

    return $array;
}
