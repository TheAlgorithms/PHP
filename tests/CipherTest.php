<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../ciphers/XORCipher.php';

class CipherTest extends TestCase
{
    public function testXor_cipher()
    {
        $inp_str = "test@string";
        $key = "test-key";
        $invalid_key = "wrong-key";
        assertEquals( $inp_str, xor_cipher( xor_cipher( $inp_str , $key) , $key));
        assertNotEquals( $inp_str, xor_cipher( xor_cipher( $inp_str , $key) , $invalid_key));
    }
}
