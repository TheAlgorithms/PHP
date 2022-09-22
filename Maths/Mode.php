<?php
/**
 * This function calculates
 * The mode value of
 * numbers provided
 * 
 * @param decimal $numbers A variable sized number input
 * @return decimal $mode Mode of provided numbers
 */
function mode(...$numbers)
{
    if (empty($numbers)) {
        throw new \Exception('Please pass values to find mean value');
    }

    $values = array_count_values($numbers); 
    $mode = array_search(max($values), $values);

    return $mode;
}