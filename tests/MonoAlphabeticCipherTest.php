<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

require_once __DIR__ . '/../app/monoAlphabeticCipher.php';

class MonoAlphabeticCipherTest extends TestCase
{
    public function testLala(){
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $key = "yhkqgvxfoluapwmtzecjdbsnri";
        $text = "I love1234 GitHub";
        $encryptedText = "O ambg XojFdh";

        assertEquals(encrypt($key, $alphabet, $text), $encryptedText);
        assertEquals(decrypt($key, $alphabet, $encryptedText), "I love GitHub");
    }
}

?>
