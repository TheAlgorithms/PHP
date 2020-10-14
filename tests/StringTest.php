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
require_once __DIR__ . '/../String/CheckAnagram.php';
require_once __DIR__ . '/../String/MaxCharacter.php';
require_once __DIR__ . '/../String/CountVowels.php';

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

    public function testIsAnagram()
    {
        assertTrue(isAnagram("php", "PHP")); // By default it's case-insensitive
        assertFalse(isAnagram("php", "PHP", false)); // Make case-sensitive check
        assertTrue(isAnagram("php is fun", "pin hpf us"));
        assertFalse(isAnagram("Hello", " Hello")); //Extra space character
        assertTrue(isAnagram("ScRamble", "SRlmcaeb", false)); // Check with a mixture of upper and lower case
    }

    public function testMaxCharacter()
    {
        assertEquals(maxCharacter("this is test for max character repetition"), 't');
        assertEquals(maxCharacter("This is Test for max characTer repetition"), 't');
        assertEquals(maxCharacter("           "), ' ');
    }

    public function testCountVowels()
    {
        assertEquals(countVowelsSimple("This is a string with 7 vowels"), 7);
        assertEquals(countVowelsSimple("hello world"), 3);
        assertEquals(countVowelsRegex("Just A list of somE aaaaaaaaaa"), 16);

        assertEquals(countVowelsRegex("This is a string with 7 vowels"), 7);
        assertEquals(countVowelsRegex("hello world"), 3);
        assertEquals(countVowelsRegex("Just A list of somE aaaaaaaaaa"), 16);
    }
}
