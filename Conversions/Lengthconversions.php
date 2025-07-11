<?php

class LengthConversions
{
    public static function mToKm($m)
    {
        if (!is_numeric($m)) {
            throw new \InvalidArgumentException("Invalid input for mToKm: expected numeric, got string ('{$m}')");
        }
        return round($m / 1000, 6);
    }

    public static function kmToM($km)
    {
        if (!is_numeric($km)) {
            throw new \InvalidArgumentException("Invalid input for kmToM: expected numeric, got string ('{$km}')");
        }
        return round($km * 1000, 6);
    }

    public static function mToMiles($m)
    {
        if (!is_numeric($m)) {
            throw new \InvalidArgumentException("Invalid input for mToMiles: expected numeric, got string ('{$m}')");
        }
        return round($m * 0.000621373, 6);
    }

    public static function milesToM($miles)
    {
        if (!is_numeric($miles)) {
            throw new \InvalidArgumentException("Invalid input for milesToM: expected numeric, got string ('{$miles}')");
        }
        return round($miles * 1609.34, 6);
    }

    public static function inToCm($in)
    {
        if (!is_numeric($in)) {
            throw new \InvalidArgumentException("Invalid input for inToCm: expected numeric, got string ('{$in}')");
        }
        return round($in * 2.54, 6);
    }

    public static function cmToIn($cm)
    {
        if (!is_numeric($cm)) {
            throw new \InvalidArgumentException("Invalid input for cmToIn: expected numeric, got string ('{$cm}')");
        }
        return round($cm * 0.3937, 6);
    }

    public static function kmToMiles($km)
    {
        if (!is_numeric($km)) {
            throw new \InvalidArgumentException("Invalid input for kmToMiles: expected numeric, got string ('{$km}')");
        }
        return round($km * 0.621504, 6);
    }

    public static function milesToKm($miles)
    {
        if (!is_numeric($miles)) {
            throw new \InvalidArgumentException("Invalid input for milesToKm: expected numeric, got string ('{$miles}')");
        }
        return round($miles * 1.609, 6);
    }
}
