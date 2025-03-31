<?php

/**
 * Function returns the total number of consonants present in the given
 * string using a linear search through the string
 *
 * @param  string  $string
 * @return int
 * @throws Exception
 */
function countConsonants(string $string): int
{
    if (empty($string)) {
        throw new RuntimeException('Please pass a non-empty string value');
    }

    $vowels = ['a', 'e', 'i', 'o', 'u']; // Vowels Set
    $string = strtolower($string); // For case-insensitive checking

    $consonantCount = 0;

    $stringLength = strlen($string);
    for ($i = 0; $i < $stringLength; $i++) {
        if (
            $string[$i] >= 'a' && $string[$i] <= 'z' && !in_array($string[$i], $vowels, true)
        ) {
            $consonantCount++;
        }
    }

    return $consonantCount;
}
