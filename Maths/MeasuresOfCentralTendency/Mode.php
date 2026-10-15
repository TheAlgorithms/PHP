<?php

declare(strict_types=1);

/**
 * This function calculates
 * the mode value(s) of
 * numbers provided (Individual series)
 *
 * @param decimal $numbers A variable sized number input
 * @return array $modes Array of mode(s) of provided numbers
 * @throws \Exception
 */
function mode(...$numbers): array
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find the mode');
    }

    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            throw new \Exception('All values must be numeric');
        }
    }

    $values = array_count_values($numbers);
    $maxCount = max($values);
    return array_keys($values, $maxCount, true);
}

/**
 * Calculates the mode(s) of a discrete series.
 *
 * The mode is the value(s) with the highest frequency
 * If multiple values share the highest frequency, all are returned (multimodal)
 *
 * @param array $values The discrete values (x)
 * @param array $frequencies The frequencies of the values (f)
 * @return array Array of mode value(s) with the highest frequency
 * @throws \Exception
 */
function mode_discrete(array $values, array $frequencies): array
{
    if (count($values) !== count($frequencies)) {
        throw new \Exception('Values and frequencies arrays must have the same length');
    }

    if (empty($values)) {
        throw new \Exception('Please pass values to find the mode');
    }

    $values = array_values($values);
    $frequencies = array_values($frequencies);

    foreach ($values as $v) {
        if (!is_numeric($v)) {
            throw new \Exception('All values must be numeric');
        }
    }

    foreach ($frequencies as $f) {
        if (!is_numeric($f) || $f < 0) {
            throw new \Exception('All frequencies must be non-negative numeric values');
        }
    }

    $totalFrequency = array_sum($frequencies);

    if ($totalFrequency == 0) {
        throw new \Exception('Total frequency cannot be zero');
    }

    $maxFreq = max($frequencies);
    $modes = [];

    for ($i = 0; $i < count($values); $i++) {
        if ($frequencies[$i] == $maxFreq) {
            $modes[] = $values[$i];
        }
    }

    return $modes;
}

/**
 * Calculates the mode of a continuous series using the interpolation formula
 *
 * Formula: Mode = L + ((f1 - f0) / (2*f1 - f0 - f2)) * h
 * Where:
 * L  = Lower bound of the modal class (class with highest frequency)
 * f1 = Frequency of the modal class
 * f0 = Frequency of the class preceding the modal class
 * f2 = Frequency of the class following the modal class
 * h  = Class width (Upper bound - Lower bound)

 * @param array $lower_bounds The lower bounds of the class intervals
 * @param array $upper_bounds The upper bounds of the class intervals
 * @param array $frequencies The frequencies of the class intervals
 * @return int|float Mode of the continuous series
 * @throws \Exception
 */
function mode_continuous(array $lower_bounds, array $upper_bounds, array $frequencies): int|float
{
    if (count($lower_bounds) !== count($upper_bounds) || count($lower_bounds) !== count($frequencies)) {
        throw new \Exception('Lower bounds, upper bounds, and frequencies arrays must have the same length');
    }

    if (empty($lower_bounds)) {
        throw new \Exception('Please pass values to find the mode');
    }

    $lower_bounds = array_values($lower_bounds);
    $upper_bounds = array_values($upper_bounds);
    $frequencies = array_values($frequencies);

    foreach ($lower_bounds as $lb) {
        if (!is_numeric($lb)) {
            throw new \Exception('All lower bounds must be numeric');
        }
    }

    foreach ($upper_bounds as $ub) {
        if (!is_numeric($ub)) {
            throw new \Exception('All upper bounds must be numeric');
        }
    }

    foreach ($frequencies as $f) {
        if (!is_numeric($f) || $f < 0) {
            throw new \Exception('All frequencies must be non-negative numeric values');
        }
    }

    $totalFrequency = array_sum($frequencies);

    if ($totalFrequency == 0) {
        throw new \Exception('Total frequency cannot be zero');
    }

    $data = [];
    for ($i = 0; $i < count($lower_bounds); $i++) {
        $data[] = [
            'L' => $lower_bounds[$i],
            'U' => $upper_bounds[$i],
            'f' => $frequencies[$i]
        ];
    }
    usort($data, fn($a, $b) => $a['L'] <=> $b['L']);

    $maxFreq = max(array_column($data, 'f'));
    $modalIndex = -1;

    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['f'] == $maxFreq) {
            $modalIndex = $i;
            break;
        }
    }

    $L = $data[$modalIndex]['L'];
    $f1 = $data[$modalIndex]['f'];
    $f0 = $modalIndex > 0 ? $data[$modalIndex - 1]['f'] : 0;
    $f2 = $modalIndex < count($data) - 1 ? $data[$modalIndex + 1]['f'] : 0;
    $h = $data[$modalIndex]['U'] - $data[$modalIndex]['L'];

    $denominator = 2 * $f1 - $f0 - $f2;

    if ($denominator == 0) {
        throw new \Exception('Cannot determine mode: denominator is zero (ambiguous modal class)');
    }

    return $L + (($f1 - $f0) / $denominator) * $h;
}
