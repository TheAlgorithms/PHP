<?php

/**
* This function converts the submitted
* temperature (Celsius) and converts it into
* Fahrenheit.
*
* @author Marco https://github.com/MaarcooC
* @param float $celsius
* @throws Exception
* @return float
*/
function CelsiusToFahrenheit($celsius): float
{
    if (!is_numeric($celsius)) {
        throw new RuntimeException("Temperature (Celsius) must be a number");
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
* @throws Exception
* @return float
*/
function FahrenheitToCelsius(float $fahrenheit): float
{
    if (!is_numeric($fahrenheit)) {
        throw new RuntimeException("Temperature (Fahrenheit) must be a number");
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
* @throws Exception
* @return float
*/
function CelsiusToKelvin(float $celsius): float
{
    if (!is_numeric($celsius)) {
        throw new RuntimeException("Temperature (Celsius) must be a number");
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
* @throws Exception
* @return float
*/
function KelvinToCelsius(float $kelvin): float
{
    if (!is_numeric($kelvin)) {
        throw new RuntimeException("Temperature (Kelvin) must be a number");
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
* @throws Exception
* @return float
*/
function KelvinToFahrenheit(float $kelvin): float
{
    if (!is_numeric($kelvin)) {
        throw new RuntimeException("Temperature (Kelvin) must be a number");
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
* @throws Exception
* @return float
*/
function FahrenheitToKelvin(float $fahrenheit): float
{
    if (!is_numeric($fahrenheit)) {
        throw new RuntimeException("Temperature (Fahrenheit) must be a number");
    }

    return round(($fahrenheit - 32) * 5 / 9 + 273.15, 2);
}
