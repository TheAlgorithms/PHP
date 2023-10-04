<?php

/**
 * This function returns the total number of vowels present in
 * the given string using a simple method of looping through
 * all the characters present in the string.
 *
 * @param  string  $string
 * @return int   $numberOfVowels
 * @throws \Exception
 */
function countVowelsSimple(string $string)
{
    if (empty($string)) {
        throw new \Exception('Please pass a non-empty string value');
    }

    $numberOfVowels = 0;
    $vowels     = ['a', 'e', 'i', 'o', 'u'];
// Vowels Set
    $string     = strtolower($string);
// For case-insensitive checking
    $characters = str_split($string);
// Splitting the string to a Character Array.

    foreach ($characters as $character) {
        if (in_array($character, $vowels)) {
            $numberOfVowels++;
        }
    }

    return $numberOfVowels;
}

/**
 * This function returns the Total number of vowels present in the given
 * string using a regular expression.
 *
 * @param  string  $string
 * @return int
 * @throws \Exception
 */
function countVowelsRegex(string $string)
{
    if (empty($string)) {
        throw new \Exception('Please pass a non-empty string value');
    }
    $string = strtolower($string);
// For case-insensitive checking

    return preg_match_all('/[a,e,i,o,u]/', $string);
}
