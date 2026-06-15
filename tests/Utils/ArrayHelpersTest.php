<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Utils/ArrayHelpers.php';

class ArrayHelpersTest extends TestCase
{
    public function testIsSortedAscendingIntsAcceptsSortedIntegers(): void
    {
        $this->expectNotToPerformAssertions();

        isSortedAscendingInts([1, 2, 3]);
    }

    public function testIsSortedAscendingIntsRejectsUnsortedValues(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        isSortedAscendingInts([1, 3, 2]);
    }
}
