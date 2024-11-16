<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../Conversions/BinaryToDecimal.php';
require_once __DIR__ . '/../../Conversions/DecimalToBinary.php';
require_once __DIR__ . '/../../Conversions/OctalToDecimal.php';
require_once __DIR__ . '/../../Conversions/HexadecimalToDecimal.php';
require_once __DIR__ . '/../../Conversions/SpeedConversion.php';
require_once __DIR__ . '/../../Conversions/TemperatureConversions.php';
require_once __DIR__ . '/../../Conversions/ConvertTime.php';

class ConversionsTest extends TestCase
{
    public function testBinaryToDecimal()
    {
        $this->assertEquals(7, binaryToDecimal(111));
        $this->assertEquals(5, binaryToDecimal(101));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Binary Number for Converting it to a Decimal Number.');
        binaryToDecimal("this is a string");
    }

    public function testDecimalToBinary()
    {
        $this->assertEquals(111, decimalToBinary(7));
        $this->assertEquals(101, decimalToBinary(5));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Decimal Number for Converting it to a Binary Number.');
        decimalToBinary("this is a string");
    }

    public function testOctalToDecimal()
    {
        $this->assertEquals(8, octalToDecimal(10));
        $this->assertEquals(9, octalToDecimal(11));
        $this->assertEquals(589, octalToDecimal(1115));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Octal Number for Converting it to a Decimal Number.');
        octalToDecimal("this is a string");
    }

    public function testDecimalToOctal()
    {
        $this->assertEquals(10, decimalToOctal(8));
        $this->assertEquals(11, decimalToOctal(9));
        $this->assertEquals(1115, decimalToOctal(589));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Decimal Number for Converting it to an Octal Number.');
        decimalToOctal("this is a string");
    }

    public function testDecimalToHex()
    {
        $this->assertEquals('A', decimalToHex(10));
        $this->assertEquals('1D28A0D3', decimalToHex(489201875));
        $this->assertEquals('AB', decimalToHex(171));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Decimal Number for Converting it to a Hexadecimal Number.');
        decimalToHex("this is a string");
    }

    public function testHexToDecimal()
    {
        $this->assertEquals(10, hexToDecimal('A'));
        $this->assertEquals(489201875, hexToDecimal('1D28A0D3'));
        $this->assertEquals(171, hexToDecimal('AB'));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Hexadecimal Number for Converting it to a Decimal Number.');
        hexToDecimal("this is a string");
    }

    public function testSpeedConversion()
    {
        $this->assertEquals(11.18, convertSpeed(5, 'm/s', 'mph'));
        $this->assertEquals(5.49, convertSpeed(5, 'ft/s', 'km/h'));
        $this->assertEquals(3, convertSpeed(3, 'km/h', 'km/h'));
        $this->assertEquals(12.96, convertSpeed(7, 'kn', 'km/h'));
        $this->assertEquals(19.31, convertSpeed(12, 'mph', 'km/h'));
        $this->assertEquals(1, convertSpeed(0.514, 'm/s', 'kn'));

        $this->expectException(\Exception::class);
        convertSpeed('1', 'km/h', 'mph');

        $this->expectException(\Exception::class);
        convertSpeed(1, 'km/h', 'miles');
    }

    public function testCelsiusToFahrenheit()
    {
        $this->assertEquals(32.0, CelsiusToFahrenheit(0));
        $this->assertEquals(212.0, CelsiusToFahrenheit(100));
        $this->assertEquals(98.6, CelsiusToFahrenheit(37));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Temperature (Celsius) must be a number');
        CelsiusToFahrenheit("non-numeric");
    }

    public function testFahrenheitToCelsius()
    {
        $this->assertEquals(0.0, FahrenheitToCelsius(32));
        $this->assertEquals(100.0, FahrenheitToCelsius(212));
        $this->assertEquals(37.0, FahrenheitToCelsius(98.6));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Temperature (Fahrenheit) must be a number');
        FahrenheitToCelsius("non-numeric");
    }

    public function testCelsiusToKelvin()
    {
        $this->assertEquals(273.15, CelsiusToKelvin(0));
        $this->assertEquals(373.15, CelsiusToKelvin(100));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Temperature (Celsius) must be a number');
        CelsiusToKelvin("non-numeric");
    }

    public function testKelvinToCelsius()
    {
        $this->assertEquals(0.0, KelvinToCelsius(273.15));
        $this->assertEquals(100.0, KelvinToCelsius(373.15));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Temperature (Kelvin) must be a number');
        KelvinToCelsius("non-numeric");
    }

    public function testKelvinToFahrenheit()
    {
        $this->assertEquals(32.0, KelvinToFahrenheit(273.15));
        $this->assertEquals(212.0, KelvinToFahrenheit(373.15));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Temperature (Kelvin) must be a number');
        KelvinToFahrenheit("non-numeric");
    }

    public function testFahrenheitToKelvin()
    {
        $this->assertEquals(273.15, FahrenheitToKelvin(32));
        $this->assertEquals(373.15, FahrenheitToKelvin(212));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Temperature (Fahrenheit) must be a number');
        FahrenheitToKelvin("non-numeric");
    }

    public function testConvertTime()
    {
        $examples = [
            [120, 'minutes', 'seconds', 7200],
            [48, 'hours', 'days', 2.0],
            [14, 'days', 'weeks', 2.0],
            [8.6, 'weeks', 'months', 2.0],
            [24, 'months', 'years', 2.0],
            [3600, 'seconds', 'hours', 1.0],
        ];
    
        foreach ($examples as [$value, $from, $to, $expected]) {
            $result = convertTime($value, $from, $to);
            $this->assertEquals($expected, $result, "Failed converting $value $from to $to");
            echo "Example: $value $from = $result $to\n";
        }
    }
    
}
