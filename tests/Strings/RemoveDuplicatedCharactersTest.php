<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Strings/RemoveDuplicatedCharacters.php';

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for the removeDuplicatedCharacters function.
 * To run test: ./vendor/bin/phpunit tests/strings/RemoveDuplicatedCharactersTest.php
 */
final class RemoveDuplicatedCharactersTest extends TestCase
{
    /**
     * Test with a string that has multiple duplicates.
     */
    public function testStringWithDuplicates(): void
    {
        $this->assertSame('progamin', removeDuplicatedCharacters('programming'));
    }

    /**
     * Test with a string that has no duplicates.
     */
    public function testStringWithoutDuplicates(): void
    {
        $this->assertSame('abc', removeDuplicatedCharacters('abc'));
    }

    /**
     * Test with an empty string.
     */
    public function testEmptyString(): void
    {
        $this->assertSame('', removeDuplicatedCharacters(''));
    }

    /**
     * Test with a string containing only one character repeated.
     */
    public function testSingleCharacterRepeated(): void
    {
        $this->assertSame('a', removeDuplicatedCharacters('aaaaa'));
    }

    /**
     * Test with special characters.
     */
    public function testStringWithSpecialCharacters(): void
    {
        $this->assertSame('ab!@', removeDuplicatedCharacters('aabb!!@@'));
    }

    /**
     * Test with a string containing spaces.
     */
    public function testStringWithSpaces(): void
    {
        $this->assertSame('a b', removeDuplicatedCharacters('a a a b b'));
    }

    /**
     * Test with a string containing mixed case characters.
     */
    public function testStringWithMixedCase(): void
    {
        $this->assertSame('aAbB', removeDuplicatedCharacters('aAaAaAbBbB'));
    }
}
