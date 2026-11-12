<?php

/**
 * Class for converting weight between different units.
 */
class WeightConversions
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
            throw new InvalidArgumentException("Invalid input for $method");
        }
    }

    /**
     * Converts kilograms to pounds.
     *
     * @param float $kg The weight in kilograms.
     * @return float The equivalent weight in pounds.
     * @see https://en.wikipedia.org/wiki/Kilogram
     */
    public static function kgToLbs($kg)
    {
        self::validateInput($kg, 'kgToLbs');
        return round($kg * 2.20462, 4);
    }

    /**
     * Converts pounds to kilograms.
     *
     * @param float $lbs The weight in pounds.
     * @return float The equivalent weight in kilograms.
     * @see https://en.wikipedia.org/wiki/Pound_(mass)
     */
    public static function lbsToKg($lbs)
    {
        self::validateInput($lbs, 'lbsToKg');
        return round($lbs / 2.20462, 4);
    }

    /**
     * Converts grams to kilograms.
     *
     * @param float $grams The weight in grams.
     * @return float The equivalent weight in kilograms.
     */
    public static function gToKg($grams)
    {
        self::validateInput($grams, 'gToKg');
        return round($grams / 1000, 4);
    }

    /**
     * Converts kilograms to grams.
     *
     * @param float $kg The weight in kilograms.
     * @return float The equivalent weight in grams.
     */
    public static function kgToG($kg)
    {
        self::validateInput($kg, 'kgToG');
        return round($kg * 1000, 4);
    }

    /**
     * Converts ounces to pounds.
     *
     * @param float $oz The weight in ounces.
     * @return float The equivalent weight in pounds.
     */
    public static function ozToLbs($oz)
    {
        self::validateInput($oz, 'ozToLbs');
        return round($oz / 16, 4);
    }

    /**
     * Converts pounds to ounces.
     *
     * @param float $lbs The weight in pounds.
     * @return float The equivalent weight in ounces.
     */
    public static function lbsToOz($lbs)
    {
        self::validateInput($lbs, 'lbsToOz');
        return round($lbs * 16, 4);
    }
}
