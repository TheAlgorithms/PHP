<?php

use function PHPUnit\Framework\assertEquals;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../Conversions/BinaryToDecimal.php';
require_once __DIR__ . '/../../Conversions/DecimalToBinary.php';
require_once __DIR__ . '/../../Conversions/OctalToDecimal.php';
require_once __DIR__ . '/../../Conversions/HexadecimalToDecimal.php';

class ConversionsTest extends TestCase
{
    public function testBinaryToDecimal()
    {
        assertEquals(binaryToDecimal(111), 7);
        assertEquals(binaryToDecimal(101), 5);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Binary Number for Converting it to a Decimal Number.');
        binaryToDecimal("this is a string");
    }

    public function testDecimalToBinary()
    {
        assertEquals(decimalToBinary(7), 111);
        assertEquals(decimalToBinary(5), 101);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Decimal Number for Converting it to a Binary Number.');
        decimalToBinary("this is a string");
    }

    public function testOctalToDecimal()
    {
        assertEquals(octalToDecimal(10), 8);
        assertEquals(octalToDecimal(11), 9);
        assertEquals(octalToDecimal(1115), 589);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Octal Number for Converting it to a Decimal Number.');
        octalToDecimal("this is a string");
    }

    public function testDecimalToOctal()
    {
        assertEquals(decimalToOctal(8), 10);
        assertEquals(decimalToOctal(9), 11);
        assertEquals(decimalToOctal(589), 1115);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Decimal Number for Converting it to an Octal Number.');
        decimalToOctal("this is a string");
    }

    public function testDecimalToHex()
    {
        assertEquals(decimalToHex(10), 'A');
        assertEquals(decimalToHex(489201875), '1D28A0D3');
        assertEquals(decimalToHex(171), 'AB');
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Decimal Number for Converting it to a Hexadecimal Number.');
        decimalToHex("this is a string");
    }

    public function testHexToDecimal()
    {
        assertEquals(hexToDecimal('A'), 10);
        assertEquals(hexToDecimal('1D28A0D3'), 489201875);
        assertEquals(hexToDecimal('AB'), 171);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please pass a valid Hexadecimal Number for Converting it to a Decimal Number.');
        hexToDecimal("this is a string");
    }
}
