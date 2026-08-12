<?php

/**
 * Converts a value from one time unit to another.
 *
 * @author Arafat Hossain
 * @link https://github.com/arafat-web
 * @param float $value The value to convert.
 * @param string $fromUnit The current unit of the value.
 * @param string $toUnit The target unit to convert the value to.
 * @throws InvalidArgumentException If the fromUnit or toUnit is invalid.
 * @return float The converted value, rounded to two decimal places.
 */
function convertTime(float $value, string $fromUnit, string $toUnit): float
{
    $conversionFactors = [
        'seconds' => [
            'minutes' => 1 / 60,
            'hours' => 1 / 3600,
            'days' => 1 / 86400,
            'weeks' => 1 / 604800,
            'months' => 1 / 2592000,
            'years' => 1 / 31536000
        ],
        'minutes' => [
            'seconds' => 60,
            'hours' => 1 / 60,
            'days' => 1 / 1440,
            'weeks' => 1 / 10080,
            'months' => 1 / 43200,
            'years' => 1 / 525600
        ],
        'hours' => [
            'seconds' => 3600,
            'minutes' => 60,
            'days' => 1 / 24,
            'weeks' => 1 / 168,
            'months' => 1 / 720,
            'years' => 1 / 8760
        ],
        'days' => [
            'seconds' => 86400,
            'minutes' => 1440,
            'hours' => 24,
            'weeks' => 1 / 7,
            'months' => 1 / 30.4,
            'years' => 1 / 365.25
        ],
        'weeks' => [
            'seconds' => 604800,
            'minutes' => 10080,
            'hours' => 168,
            'days' => 7,
            'months' => 1 / 4.3,
            'years' => 1 / 52.17
        ],
        'months' => [
            'seconds' => 2592000,
            'minutes' => 43200,
            'hours' => 720,
            'days' => 30.4,
            'weeks' => 4.3,
            'years' => 1 / 12
        ],
        'years' => [
            'seconds' => 31536000,
            'minutes' => 525600,
            'hours' => 8760,
            'days' => 365.25,
            'weeks' => 52.17,
            'months' => 12
        ]
    ];

    if (!isset($conversionFactors[$fromUnit], $conversionFactors[$fromUnit][$toUnit])) {
        throw new InvalidArgumentException("Invalid time unit(s) specified: $fromUnit to $toUnit.");
    }

    $conversionFactor = $conversionFactors[$fromUnit][$toUnit];
    $result = $value * $conversionFactor;

    return round($result, 2);
}

// Example usage
try {
    $timeResult = convertTime(120, 'minutes', 'seconds');
    echo "120 minutes = $timeResult seconds\n";
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
