<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

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
        assertEquals(maEncrypt($key, $alphabet, $text), $encryptedText);
        assertEquals(maDecrypt($key, $alphabet, $encryptedText), "I love GitHub");
    }
}
