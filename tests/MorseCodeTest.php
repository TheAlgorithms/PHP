<?php

use function PHPUnit\Framework\assertEquals;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../ciphers/morseCode.php';

class CiphersTest extends TestCase
{
    public function testCaesarCipher()
    {
        assertEquals('Test 123', decrypt(encrypt('Test 123')));
    }
}
