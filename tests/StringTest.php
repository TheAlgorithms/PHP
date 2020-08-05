<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../String/CheckPalindrome.php';
require_once __DIR__ . '/../String/ReverseString.php';
require_once __DIR__ . '/../String/ReverseWords.php';

class StringTest extends TestCase
{
    public function testIsPalindrome()
    {
        assertTrue(is_palindrome('MaDam')); // true
        assertFalse(is_palindrome('ThisIsTest')); // false
        assertFalse(is_palindrome('')); // false
        assertTrue(is_palindrome('Sator Arepo Tenet Opera Rotas')); // true
        assertFalse(is_palindrome('Sator Arepo Tenet Opera Rotas', false)); // false since we are doing case-sensitive check
    }

    public function testReverseString()
    {
        assertEquals('txet emos si sihT', reverse_string('This is some text'));
        assertEquals('mADaM', reverse_string('MaDAm'));
        assertNotEquals('MaDAm', reverse_string('MaDAm'));
    }

    public function testReverseWords()
    {
        assertEquals('Fun is Coding PHP', reverse_words('PHP Coding is Fun'));
        assertEquals('OneWord', reverse_words('OneWord'));
        assertEquals('Text different some is This', reverse_words('This is some different Text'));
    }
}
