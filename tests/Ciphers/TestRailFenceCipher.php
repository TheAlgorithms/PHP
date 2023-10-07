<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php'; // Adjust the path as needed
require_once __DIR__ . '/../../Ciphers/RailFenceCipher.php'; // Adjust the path as needed

class RailFenceCipherTest extends TestCase
{
    public function testRailFenceCipherCase1()
    {
        $plainMessage = "ABCDEF";
        $rails = 3;
        $cipherMessage = encode($plainMessage, $rails);
        $decodedMessage = decode($cipherMessage, $rails);
        
        $this->assertEquals($plainMessage, $decodedMessage);
    }

    public function testRailFenceCipherCase2()
    {
        $plainMessage = "THIS IS RAILFENCE";
        $rails = 3;
        $cipherMessage = encode($plainMessage, $rails);
        $decodedMessage = decode($cipherMessage, $rails);
        
        $this->assertEquals($plainMessage, $decodedMessage);
    }
}
