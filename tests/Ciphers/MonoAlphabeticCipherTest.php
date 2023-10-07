<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/MonoAlphabeticCipher.php';

class MonoAlphabeticCipherTest extends TestCase
{
    public function testMonoAlphabeticCipher()
    {
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $key = "yhkqgvxfoluapwmtzecjdbsnri";
        $text = "I love1234 GitHub";
        $encryptedText = "O ambg XojFdh";
        $this->assertEquals(maEncrypt($key, $alphabet, $text), $encryptedText);
        $this->assertEquals(maDecrypt($key, $alphabet, $encryptedText), "I love GitHub");
    }
}
