<?php

/**
 * This a simple function returns
 * the Total number of vowels total 
 * number of consonant and total 
 * numeric number present in the
 * given string using a simple
 * method of looping through all
 * characters present in the string
 *
 * @param string $string
 * 
 */
function countVowelsConsonant(string $string): String
{
    if (empty($string)) {
        throw new \Exception('Please pass a non-empty string value');
    }

    $vowels     = ['a', 'e', 'i', 'o', 'u']; // Vowels Set
    $string     = strtolower($string); // For case-insensitive checking

    $vowelCount = 0;
    $consonantCount = 0;
    $numberCount = 0;

    for ($i = 0; $i < strlen($string); $i++) {

        if (in_array($string[$i], $vowels)) {

            $vowelCount++;
        } elseif ($string[$i] >= 'a' && $string[$i] <= 'z') {

            $consonantCount++;
        } elseif ($string[$i] >= 0 && $string[$i] <= 9 && is_numeric($string[$i])) {

            $numberCount++;
        }
    }

    return 'total vowels - ' . $vowelCount . PHP_EOL .
        'total consonant - ' . $consonantCount . PHP_EOL .
        'total numeric number -' . $numberCount . PHP_EOL;
}

// example
echo countVowelsConsonant('Hello World. 12345');
echo countVowelsConsonant('Count Vowels, Consonant and numeric number. 09876');
