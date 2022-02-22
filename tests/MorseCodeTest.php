<?php

use function PHPUnit\Framework\assertEquals;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../ciphers/morseCode.php';

class MorseCodeTest extends TestCase
{
    public function testCaesarCipher()
    {
        assertEquals('TEST 123', decode(encode('TEST 123')));
    }
}
