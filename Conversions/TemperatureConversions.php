<?php

declare(strict_types=1);

/**
* This function converts the submitted
* temperature (Celsius) and converts it into
* Fahrenheit.
*
* @author Marco https://github.com/MaarcooC
* @param float $celsius
* @throws \Exception
*/
function CelsiusToFahrenheit($celsius): float
{
    if (!is_numeric($celsius)) {
        throw new \Exception("Temperature (Celsius) must be a number");
    }

    return round(($celsius * 9 / 5) + 32, 1);
}

/**
* This function converts the submitted
* temperature (Fahrenheit) and converts it into
* Celsius.
*
* @author Marco https://github.com/MaarcooC
* @param float $fahrenheit
* @throws \Exception
*/
function FahrenheitToCelsius($fahrenheit): float
{
    if (!is_numeric($fahrenheit)) {
        throw new \Exception("Temperature (Fahrenheit) must be a number");
    }

    return round(($fahrenheit - 32) * 5 / 9, 1);
}

/**
* This function converts the submitted
* temperature (Celsius) and converts it into
* Kelvin.
*
* @author Marco https://github.com/MaarcooC
* @param float $celsius
* @throws \Exception
*/
function CelsiusToKelvin($celsius): float
{
    if (!is_numeric($celsius)) {
        throw new \Exception("Temperature (Celsius) must be a number");
    }

    return round(($celsius + 273.15), 2);
}

/**
* This function converts the submitted
* temperature (Kelvin) and converts it into
* Celsius.
*
* @author Marco https://github.com/MaarcooC
* @param float $kelvin
* @throws \Exception
*/
function KelvinToCelsius($kelvin): float
{
    if (!is_numeric($kelvin)) {
        throw new \Exception("Temperature (Kelvin) must be a number");
    }

    return round(($kelvin - 273.15), 2);
}

/**
* This function converts the submitted
* temperature (Kelvin) and converts it into
* Fahrenheit.
*
* @author Marco https://github.com/MaarcooC
* @param float $kelvin
* @throws \Exception
*/
function KelvinToFahrenheit($kelvin): float
{
    if (!is_numeric($kelvin)) {
        throw new \Exception("Temperature (Kelvin) must be a number");
    }

    return round(($kelvin - 273.15) * 1.8 + 32, 2);
}

/**
* This function converts the submitted
* temperature (Fahrenheit) and converts it into
* kelvin.
*
* @author Marco https://github.com/MaarcooC
* @param float $fahrenheit
* @throws \Exception
*/
function FahrenheitToKelvin($fahrenheit): float
{
    if (!is_numeric($fahrenheit)) {
        throw new \Exception("Temperature (Fahrenheit) must be a number");
    }

    return round(($fahrenheit - 32) * 5 / 9 + 273.15, 2);
}
