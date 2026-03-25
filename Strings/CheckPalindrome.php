<?php

declare(strict_types=1);

/**
 * Checks if a string is a palindrome
 */
function isPalindrome(string $string, bool $caseInsensitive = true): bool
{
    $string = trim($string); // Removing leading and trailing spaces

    if ($string === '' || $string === '0') {
        return false; // Returning false for an Empty String
    }

    if ($caseInsensitive) {
        $string = strtolower($string); // Converting string to lowercase for case-insensitive check
    }

    $characters = str_split($string);
    $counter = count($characters);

    for ($i = 0; $i < $counter; $i++) {
        if ($characters[$i] !== $characters[count($characters) - ($i + 1)]) {
            return false;
        }
    }

    return true;
}
