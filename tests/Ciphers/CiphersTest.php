<?php

use function PHPUnit\Framework\assertEquals;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/CaesarCipher.php';
require_once __DIR__ . '/../../Ciphers/XORCipher.php';

class CiphersTest extends TestCase
{
    public function testCaesarCipher()
    {
        assertEquals('Aopz pz h alza.', encrypt('This is a test.', 7));
        assertEquals('Aopz pz h alza.', encrypt('This is a test.', 7 + 26));
        assertEquals('This is a test.', decrypt('Aopz pz h alza.', 7));
        assertEquals('This is a test.', decrypt('Aopz pz h alza.', 7 + 26));
    }

    public function testXorCipher()
    {
        $inp_str = "test@string";
        $key = "test-key";
        $invalid_key = "wrong-key";
        assertEquals( $inp_str, xorCipher( xorCipher( $inp_str , $key) , $key));
        assertNotEquals( $inp_str, xorCipher( xorCipher( $inp_str , $key) , $invalid_key));
    }
}
