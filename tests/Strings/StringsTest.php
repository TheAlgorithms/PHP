<?php

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../Strings/CheckAnagram.php';
require_once __DIR__ . '/../../Strings/CheckPalindrome.php';
require_once __DIR__ . '/../../Strings/CheckPalindrome2.php';
require_once __DIR__ . '/../../Strings/CountConsonants.php';
require_once __DIR__ . '/../../Strings/CountSentences.php';
require_once __DIR__ . '/../../Strings/CountVowels.php';
require_once __DIR__ . '/../../Strings/Distance.php';
require_once __DIR__ . '/../../Strings/MaxCharacter.php';
require_once __DIR__ . '/../../Strings/ReverseString.php';
require_once __DIR__ . '/../../Strings/ReverseWords.php';

class StringsTest extends TestCase
{
    public function testIsPalindrome()
    {
        assertTrue(isPalindrome('MaDam')); // true
        assertFalse(isPalindrome('ThisIsTest')); // false
        assertFalse(isPalindrome('')); // false
        assertTrue(isPalindrome('Sator Arepo Tenet Opera Rotas')); // true
        assertFalse(isPalindrome('Sator Arepo Tenet Opera Rotas', false)); // false since we are doing case-sensitive check
    }

    public function testCountSentences()
    {
        assertEquals(countSentences('Hi! Hello world.'), 2);
        assertEquals(countSentences('i am testing. test....'), 2);
        assertEquals(countSentences('How are you?'), 1);
    }

    public function testReverseString()
    {
        assertEquals('txet emos si sihT', reverseString('This is some text'));
        assertEquals('mADaM', reverseString('MaDAm'));
        assertNotEquals('MaDAm', reverseString('MaDAm'));
    }

    public function testReverseWords()
    {
        assertEquals('Fun is Coding PHP', reverseWords('PHP Coding is Fun'));
        assertEquals('OneWord', reverseWords('OneWord'));
        assertEquals('Text different some is This', reverseWords('This is some different Text'));
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

    public function testCountConsonants()
    {
        assertEquals(countConsonants("This is a string with 19 consonants"), 19);
        assertEquals(countConsonants("hello world"), 7);
        assertEquals(countConsonants("Just A list of somE aaaaaaaaaa"), 9);
    }

    public function testFindDistance()
    {
        assertEquals(findDistance("hello", "hallo"), 1);
        assertEquals(findDistance("hallo", "hello"), 1);
        assertEquals(findDistance("sunday", "sunday"), 0);
        assertEquals(findDistance("saturday", "sunday"), 3);
    }
}
