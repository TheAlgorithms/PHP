<?php

/**
 * Class for converting length between different units.
 */
class LengthConversions
{
    /**
     * Validates input for conversion methods
     *
     * @param mixed $value The value to check
     * @param string $method The method name for error message
     * @throws InvalidArgumentException
     */
    private static function validateInput($value, $method)
    {
        // Make sure we have a numeric value
        if (!is_numeric($value)) {
            throw new InvalidArgumentException("Invalid input for $method: expected numeric, got " . gettype($value) . " (" . var_export($value, true) . ")");
        }
    }

    /**
     * Converts meters to kilometers.
     *
     * @param float $meters The length in meters.
     * @return float The equivalent length in kilometers.
     */
    public static function mToKm($meters)
    {
        self::validateInput($meters, 'mToKm');
        return round($meters / 1000, 4);
    }

    /**
     * Converts kilometers to meters.
     *
     * @param float $kilometers The length in kilometers.
     * @return float The equivalent length in meters.
     */
    public static function kmToM($kilometers)
    {
        self::validateInput($kilometers, 'kmToM');
        return round($kilometers * 1000, 4);
    }

    /**
     * Converts meters to miles.
     *
     * @param float $meters The length in meters.
     * @return float The equivalent length in miles.
     */
    public static function mToMiles($meters)
    {
        self::validateInput($meters, 'mToMiles');
        return round($meters / 1609.34, 6);
    }

    /**
     * Converts miles to meters.
     *
     * @param float $miles The length in miles.
     * @return float The equivalent length in meters.
     */
    public static function milesToM($miles)
    {
        self::validateInput($miles, 'milesToM');
        return round($miles * 1609.34, 4);
    }

    /**
     * Converts inches to centimeters.
     *
     * @param float $inches The length in inches.
     * @return float The equivalent length in centimeters.
     */
    public static function inToCm($inches)
    {
        self::validateInput($inches, 'inToCm');
        return round($inches * 2.54, 4);
    }

    /**
     * Converts centimeters to inches.
     *
     * @param float $centimeters The length in centimeters.
     * @return float The equivalent length in inches.
     */
    public static function cmToIn($centimeters)
    {
        self::validateInput($centimeters, 'cmToIn');
        return round($centimeters / 2.54, 2);
    }

    /**
     * Converts kilometers to miles.
     *
     * @param float $km The length in kilometers.
     * @return float The equivalent length in miles.
     */
    public static function kmToMiles($km)
    {
        self::validateInput($km, 'kmToMiles');
        return round($km / 1.609, 5);
    }

    /**
     * Converts miles to kilometers.
     *
     * @param float $miles The length in miles.
     * @return float The equivalent length in kilometers.
     */
    public static function milesToKm($miles)
    {
        self::validateInput($miles, 'milesToKm');
        return round($miles * 1.609, 4);
    }
}
