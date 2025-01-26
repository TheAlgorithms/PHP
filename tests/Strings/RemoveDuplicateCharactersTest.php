<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Strings/RemoveDuplicateCharacters.php';

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for the removeDuplicateCharacters function.
 * To run test: ./vendor/bin/phpunit tests/strings/removeDuplicateCharactersTest.php
 */
final class RemoveDuplicateCharactersTest extends TestCase
{
    /**
     * Test with a string that has multiple duplicates.
     */
    public function testStringWithDuplicates(): void
    {
        $this->assertSame('progamin', removeDuplicateCharacters('programming'));
    }

    /**
     * Test with a string that has no duplicates.
     */
    public function testStringWithoutDuplicates(): void
    {
        $this->assertSame('abc', removeDuplicateCharacters('abc'));
    }

    /**
     * Test with an empty string.
     */
    public function testEmptyString(): void
    {
        $this->assertSame('', removeDuplicateCharacters(''));
    }

    /**
     * Test with a string containing only one character repeated.
     */
    public function testSingleCharacterRepeated(): void
    {
        $this->assertSame('a', removeDuplicateCharacters('aaaaa'));
    }

    /**
     * Test with special characters.
     */
    public function testStringWithSpecialCharacters(): void
    {
        $this->assertSame('ab!@', removeDuplicateCharacters('aabb!!@@'));
    }

    /**
     * Test with a string containing spaces.
     */
    public function testStringWithSpaces(): void
    {
        $this->assertSame('a b', removeDuplicateCharacters('a a a b b'));
    }

    /**
     * Test with a string containing mixed case characters.
     */
    public function testStringWithMixedCase(): void
    {
        $this->assertSame('aAbB', removeDuplicateCharacters('aAaAaAbBbB'));
    }
}