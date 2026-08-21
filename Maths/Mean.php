<?php

declare(strict_types=1);

/**
 * This function calculates
 * The mean value of
 * numbers provided
 *
 * @param  decimal  $numbers  A variable sized number input
 * @return decimal $mean Mean of provided numbers
 * @throws \Exception
 */
function mean(...$numbers): int|float
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find mean value');
    }

    $total = array_sum($numbers);

    return $total / count($numbers);
}

/**
 * Calculates the mean of a discrete series.
 * 
 * Formula: Mean = Σ(x * f) / Σf
 * Where 'x' is the value and 'f' is its corresponding frequency.
 *
 * @param array $values The discrete values (x)
 * @param array $frequencies The frequencies of the values (f)
 * @return int|float Mean of the discrete series
 * @throws \Exception
 */
function mean_discrete(array $values, array $frequencies): int|float
{
    if (count($values) !== count($frequencies)) {
        throw new \Exception('Values and frequencies arrays must have the same length');
    }

    if (empty($values)) {
        throw new \Exception('Please pass values to find mean value');
    }

    $totalFrequency = array_sum($frequencies);
    
    if ($totalFrequency == 0) {
        throw new \Exception('Total frequency cannot be zero');
    }

    $sumProduct = 0;
    for ($i = 0; $i < count($values); $i++) {
        $sumProduct += $values[$i] * $frequencies[$i];
    }

    return $sumProduct / $totalFrequency;
}

/**
 * Calculates the mean of a continuous series.
 *
 * Formula: Mean = Σ(m * f) / Σf
 * Where 'm' is the midpoint of each class interval, and 'f' is the frequency.
 *
 * @param array $lower_bounds The lower bounds of the class intervals
 * @param array $upper_bounds The upper bounds of the class intervals
 * @param array $frequencies The frequencies of the class intervals
 * @return int|float Mean of the continuous series
 * @throws \Exception
 */
function mean_continuous(array $lower_bounds, array $upper_bounds, array $frequencies): int|float
{
    if (count($lower_bounds) !== count($upper_bounds) || count($lower_bounds) !== count($frequencies)) {
        throw new \Exception('Lower bounds, upper bounds, and frequencies arrays must have the same length');
    }

    if (empty($lower_bounds)) {
        throw new \Exception('Please pass values to find mean value');
    }

    $midpoints = [];
    for ($i = 0; $i < count($lower_bounds); $i++) {
        $midpoints[] = ($lower_bounds[$i] + $upper_bounds[$i]) / 2;
    }

    return mean_discrete($midpoints, $frequencies);
}
