<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/EratosthenesSieve.php';

use PHPUnit\Framework\TestCase;

class EratosthenesSieveTest extends TestCase
{
    public function testEratosthenesSieve()
    {
        $result = eratosthenesSieve(30);

        $this->assertEquals($result, [1, 2, 3, 5, 7, 11, 13, 17, 19, 23, 29]);
    }
}
