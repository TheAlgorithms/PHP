<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../Strings/CheckAnagram.php';
require_once __DIR__ . '/../../Strings/CheckPalindrome.php';
require_once __DIR__ . '/../../Strings/CheckPalindrome2.php';
require_once __DIR__ . '/../../Strings/CountConsonants.php';
require_once __DIR__ . '/../../Strings/CountHomogenous.php';
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
        $this->assertTrue(isPalindrome('MaDam')); // true
        $this->assertFalse(isPalindrome('ThisIsTest')); // false
        $this->assertFalse(isPalindrome('')); // false
        $this->assertTrue(isPalindrome('Sator Arepo Tenet Opera Rotas')); // true
        $this->assertFalse(isPalindrome('Sator Arepo Tenet Opera Rotas', false)); // false since we are doing
        // case-sensitive check
    }

    public function testCountSentences()
    {
        $this->assertEquals(2, countSentences('Hi! Hello world.'));
        $this->assertEquals(2, countSentences('i am testing. test....'));
        $this->assertEquals(1, countSentences('How are you?'));
    }

    public function testReverseString()
    {
        $this->assertEquals('txet emos si sihT', reverseString('This is some text'));
        $this->assertEquals('mADaM', reverseString('MaDAm'));
        $this->assertNotEquals('MaDAm', reverseString('MaDAm'));
    }

    public function testReverseWords()
    {
        $this->assertEquals('Fun is Coding PHP', reverseWords('PHP Coding is Fun'));
        $this->assertEquals('OneWord', reverseWords('OneWord'));
        $this->assertEquals('Text different some is This', reverseWords('This is some different Text'));
    }

    public function testIsAnagram()
    {
        $this->assertTrue(isAnagram("php", "PHP")); // By default it's case-insensitive
        $this->assertFalse(isAnagram("php", "PHP", false)); // Make case-sensitive check
        $this->assertTrue(isAnagram("php is fun", "pin hpf us"));
        $this->assertFalse(isAnagram("Hello", " Hello")); //Extra space character
        $this->assertTrue(isAnagram("ScRamble", "SRlmcaeb", false)); // Check with a mixture of upper and lower case
    }

    public function testMaxCharacter()
    {
        $this->assertEquals('t', maxCharacter("this is test for max character repetition"));
        $this->assertEquals('t', maxCharacter("This is Test for max characTer repetition"));
        $this->assertEquals(' ', maxCharacter("           "));
    }

    public function testCountVowels()
    {
        $this->assertEquals(7, countVowelsSimple("This is a string with 7 vowels"));
        $this->assertEquals(3, countVowelsSimple("hello world"));
        $this->assertEquals(16, countVowelsRegex("Just A list of somE aaaaaaaaaa"));

        $this->assertEquals(7, countVowelsRegex("This is a string with 7 vowels"));
        $this->assertEquals(3, countVowelsRegex("hello world"));
        $this->assertEquals(16, countVowelsRegex("Just A list of somE aaaaaaaaaa"));
    }

    public function testCountConsonants()
    {
        $this->assertEquals(19, countConsonants("This is a string with 19 consonants"));
        $this->assertEquals(7, countConsonants("hello world"));
        $this->assertEquals(9, countConsonants("Just A list of somE aaaaaaaaaa"));
    }
    public function testCountHomogenous()
    {
        $this->assertEquals(3, countHomogenous("abbcccaa"));
        $this->assertEquals(2, countHomogenous("xy"));
    }

    public function testFindDistance()
    {
        $this->assertEquals(1, findDistance("hello", "hallo"));
        $this->assertEquals(1, findDistance("hallo", "hello"));
        $this->assertEquals(0, findDistance("sunday", "sunday"));
        $this->assertEquals(3, findDistance("saturday", "sunday"));
    }
}
