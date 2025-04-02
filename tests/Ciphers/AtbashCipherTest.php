<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/AtbashCipher.php';

class AtbashCipherTest extends TestCase
{
    public function testEncryptionAndDecryption(): void
    {
        $plainText = "HELLO";
        $encryptedText = atbash_encrypt($plainText);
        $decryptedText = atbash_decrypt($encryptedText);
        $this->assertEquals($plainText, $decryptedText);
    }

    public function testWithNonAlphabetCharacters(): void
    {
        $plainText = "HELLO, WORLD!";
        $encryptedText = atbash_encrypt($plainText);
        $decryptedText = atbash_decrypt($encryptedText);
        $this->assertEquals($plainText, $decryptedText);
    }
}
