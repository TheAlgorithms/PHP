<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/MorseCode.php';

class MorseCodeTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testMorseCodeCipher(): void
    {
        $this->assertEquals('TEST 123', decode(encode('TEST 123')));
    }
}
