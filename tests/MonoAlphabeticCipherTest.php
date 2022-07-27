<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

require_once __DIR__ . '/../ciphers/monoAlphabeticCipher.php';

class MonoAlphabeticCipherTest extends TestCase
{
    public function testMonoAlphabeticCipher(){
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $key = "yhkqgvxfoluapwmtzecjdbsnri";
        $text = "I love1234 GitHub";
        $encryptedText = "O ambg XojFdh";

        assertEquals(maEncrypt($key, $alphabet, $text), $encryptedText);

        assertEquals(decrypt($key, $alphabet, $encryptedText), "I love GitHub");
    }
}

?>
