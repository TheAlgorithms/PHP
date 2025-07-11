<?php

class WeightConversions
{
    public static function kgToLbs($kg)
    {
        if (!is_numeric($kg)) {
            throw new \InvalidArgumentException("Invalid input for kgToLbs: expected numeric, got string ('{$kg}')");
        }
        return round($kg * 2.20462, 5);
    }

    public static function lbsToKg($lbs)
    {
        if (!is_numeric($lbs)) {
            throw new \InvalidArgumentException("Invalid input for lbsToKg: expected numeric, got string ('{$lbs}')");
        }
        return round($lbs * 0.453593, 5);
    }

    public static function gToKg($g)
    {
        if (!is_numeric($g)) {
            throw new \InvalidArgumentException("Invalid input for gToKg: expected numeric, got string ('{$g}')");
        }
        return round($g / 1000, 5);
    }

    public static function kgToG($kg)
    {
        if (!is_numeric($kg)) {
            throw new \InvalidArgumentException("Invalid input for kgToG: expected numeric, got string ('{$kg}')");
        }
        return round($kg * 1000, 5);
    }

    public static function ozToLbs($oz)
    {
        if (!is_numeric($oz)) {
            throw new \InvalidArgumentException("Invalid input for ozToLbs: expected numeric, got string ('{$oz}')");
        }
        return round($oz * 0.0625, 5);
    }

    public static function lbsToOz($lbs)
    {
        if (!is_numeric($lbs)) {
            throw new \InvalidArgumentException("Invalid input for lbsToOz: expected numeric, got string ('{$lbs}')");
        }
        return round($lbs * 16, 5);
    }
}
