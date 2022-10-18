<?php

/**
 * This function converts the submitted
 * speed from one unit to another
 *
 * Conversion explanation taken from
 * https://www.asknumbers.com/SpeedConversion.aspx
 * Available units for conversion:
 * mph -> miles per hour
 * km/h -> kilometers per hour
 * m/s -> meters per second
 * ft/s -> feet per second
 * kn -> 1 knot which is equal to 1 nautical mile (1852 km/h)
 * The conversion is made using kilometers as base
 *
 * @param float $speed
 * @param string $unitFrom
 * @param string $unitTo
 * @return int
 */
function convertSpeed(float $speed, string $unitFrom, string $unitTo)
{
    $speedUnitsFrom = [
        'mph' => 1.609344,
        'km/h' => 1,
        'm/s'=> 3.6,
        'ft/s'=> 1.097,
        'kn' => 1.852,
    ];
    $speedUnitsTo = [
        'mph' => 0.6213712,
        'km/h' => 1,
        'm/s'=> 0.277778,
        'ft/s'=> 0.911344,
        'kn' => 0.539957,
    ];
    $availableUnits = array_keys($speedUnitsFrom);

    if (!is_numeric($speed)) {
        throw new \Exception("Please pass a valid speed number for converting it from one unit to another.");
    }
    if (!in_array($unitFrom, $availableUnits) || !in_array($unitTo, $availableUnits)) {
        throw new \Exception("Please pass a valid speed unit.\n\nAvailable units: " . implode(', ', $availableUnits));
    }

    return round($speed * $speedUnitsFrom[$unitFrom] * $speedUnitsTo[$unitTo], 2);
}
