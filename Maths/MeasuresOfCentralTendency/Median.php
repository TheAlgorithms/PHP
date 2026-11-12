<?php

declare(strict_types=1);

/** indivitaul median
 * This function calculates
 * The median value of
 * numbers provided
 *
 * @param  float|int  $numbers  A variable sized number input
 * @return float|int $median Median of provided numbers
 * @throws \Exception
 */
function median(...$numbers): float|int
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find median value');
    }

    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            throw new \Exception('Please pass numeric values to find median value');
        }
    }

    sort($numbers);
    $length = count($numbers);
    $middle = intdiv($length, 2);

    if ($length % 2 == 0) {
        return ($numbers[$middle] + $numbers[$middle - 1]) / 2;
    }

    return $numbers[$middle] + 0;
}

/**
 * Calculates the median of a discrete series.
 *
 * Formula: The value corresponding to the Cumulative Frequency (CF)
 * that is just greater than or equal to N / 2, where N = Σf.
 *
 * @param array $values The discrete values (x)
 * @param array $frequencies The frequencies of the values (f)
 * @return int|float Median of the discrete series
 * @throws \Exception
 */
function median_discrete(array $values, array $frequencies): int|float
{
    if (count($values) !== count($frequencies)) {
        throw new \Exception('Values and frequencies arrays must have the same length');
    }

    if (empty($values)) {
        throw new \Exception('Please pass values to find median value');
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

    $data = [];
    for ($i = 0; $i < count($values); $i++) {
        $data[] = ['value' => $values[$i], 'freq' => $frequencies[$i]];
    }
    usort($data, fn($a, $b) => $a['value'] <=> $b['value']);

    $cumulativeFrequency = 0;
    $targetCF = $totalFrequency / 2;
    $isEven = $totalFrequency % 2 === 0;
    $prevValue = null;

    foreach ($data as $item) {
        $cumulativeFrequency += $item['freq'];

        if ($isEven) {
            if ($cumulativeFrequency > $targetCF) {
                if ($cumulativeFrequency - $item['freq'] == $targetCF) {
                    return ($prevValue + $item['value']) / 2;
                }
                return $item['value'];
            }
            if ($cumulativeFrequency == $targetCF && $item['freq'] > 0) {
                $prevValue = $item['value'];
            }
        } else {
            if ($cumulativeFrequency >= $targetCF) {
                return $item['value'];
            }
        }
    }

    throw new \Exception('Could not determine median value');
}

/**
 * Calculates the median of a continuous series.
 *
 * Formula: Median = L + (((N/2) - CF_prev) / f) * h
 * Where:
 * L = Lower bound of the median class
 * N = Total frequency (Σf)
 * CF_prev = Cumulative frequency of the class before the median class
 * f = Frequency of the median class
 * h = Class width (Upper bound - Lower bound)
 *
 * @param array $lower_bounds The lower bounds of the class intervals
 * @param array $upper_bounds The upper bounds of the class intervals
 * @param array $frequencies The frequencies of the class intervals
 * @return int|float Median of the continuous series
 * @throws \Exception
 */
function median_continuous(array $lower_bounds, array $upper_bounds, array $frequencies): int|float
{
    if (count($lower_bounds) !== count($upper_bounds) || count($lower_bounds) !== count($frequencies)) {
        throw new \Exception('Lower bounds, upper bounds, and frequencies arrays must have the same length');
    }

    if (empty($lower_bounds)) {
        throw new \Exception('Please pass values to find median value');
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
            throw new \Exception('All frequencies must be non negative numeric values');
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

    $targetCF = $totalFrequency / 2;
    $cumulativeFrequency = 0;
    $prevCF = 0;

    foreach ($data as $item) {
        $cumulativeFrequency += $item['f'];
        if ($cumulativeFrequency >= $targetCF) {
            $L = $item['L'];
            $f = $item['f'];
            $h = $item['U'] - $item['L'];

            return $L + (($targetCF - $prevCF) / $f) * $h;
        }
        $prevCF = $cumulativeFrequency;
    }

    throw new \Exception('Could not determine median value');
}
