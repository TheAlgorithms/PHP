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
        // Test basic conversions
        $this->assertEquals(2.0, convertTime(120, 'seconds', 'minutes'), "Failed converting 120 seconds to minutes");
        $this->assertEquals(2.0, convertTime(120, 'minutes', 'hours'), "Failed converting 120 minutes to hours");
        $this->assertEquals(2.0, convertTime(48, 'hours', 'days'), "Failed converting 48 hours to days");
        $this->assertEquals(2.0, convertTime(14, 'days', 'weeks'), "Failed converting 14 days to weeks");
    
        // Test with different units and values
        $this->assertEqualsWithDelta(2.0, convertTime(8.6, 'weeks', 'months'), 0.01, "Failed converting 8.6 weeks to months");
        $this->assertEquals(2.0, convertTime(24, 'months', 'years'), "Failed converting 24 months to years");
    
        // Test edge cases
        $this->assertEquals(0.0, convertTime(0, 'seconds', 'hours'), "Failed converting 0 seconds to hours");
    
        // Test invalid 'from' and 'to' units
        try {
            convertTime(120, 'invalidUnit', 'minutes');
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Invalid time unit(s) specified: invalidUnit to minutes", $e->getMessage());
        }
    
        try {
            convertTime(120, 'seconds', 'invalidUnit');
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Invalid time unit(s) specified: seconds to invalidUnit", $e->getMessage());
        }
    
        try {
            convertTime(120, 'invalidFrom', 'invalidTo');
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Invalid time unit(s) specified: invalidFrom to invalidTo", $e->getMessage());
        }
    }
    

}
