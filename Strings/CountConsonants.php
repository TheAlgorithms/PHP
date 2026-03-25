<?php

declare(strict_types=1);

/**
 * Function returns the total number of consonants present in the given
 * string using a linear search through the string
 *
 * @throws \Exception
 */
function countConsonants(string $string): int
{
    if ($string === '' || $string === '0') {
        throw new \Exception('Please pass a non-empty string value');
    }

    $vowels     = ['a', 'e', 'i', 'o', 'u']; // Vowels Set
    $string     = strtolower($string); // For case-insensitive checking

    $consonantCount = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        if (
            !in_array($string[$i], $vowels) &&
            $string[$i] >= 'a' && $string[$i] <= 'z'
        ) {
            $consonantCount++;
        }
    }

    return $consonantCount;
}
