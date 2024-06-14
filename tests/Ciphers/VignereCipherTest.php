<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/VignereCipher.php';

class VignereCipherTest extends TestCase
{
    public function testVignereCipher()
    {
        $plaintext = "HELLO";
        $key = "KEY";
        $encryptedText = vigenere_encrypt($plaintext, $key);
        $decryptedText = vigenere_decrypt($encryptedText, $key);

        $this->assertEquals($plaintext, $decryptedText);
    }
}
