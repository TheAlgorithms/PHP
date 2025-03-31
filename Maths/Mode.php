<?php

/**
 * This function calculates
 * the mode value(s) of
 * numbers provided
 *
 * @param array $numbers A variable sized number input
 * @return array $modes Array of mode(s) of provided numbers
 * @throws Exception
 */
function mode(...$numbers): array
{
    if (empty($numbers)) {
        throw new RuntimeException('Please pass values to find the mode');
    }

    $values = array_count_values($numbers);
    $maxCount = max($values);
    return array_keys($values, $maxCount, true);
}
