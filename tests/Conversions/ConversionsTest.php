<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../Conversions/BinaryToDecimal.php';
require_once __DIR__ . '/../../Conversions/DecimalToBinary.php';
require_once __DIR__ . '/../../Conversions/OctalToDecimal.php';
require_once __DIR__ . '/../../Conversions/HexadecimalToDecimal.php';
require_once __DIR__ . '/../../Conversions/SpeedConversion.php';

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
}
