<?php

/**
 * Checks if a string is a palindrome
 *
 * @param string $string
 * @param bool $caseInsensitive
 * @return bool
 */
function isPalindrome(string $string, bool $caseInsensitive = true): bool
{
    $string = trim($string); // Removing leading and trailing spaces

    if (empty($string)) {
        return false; // Returning false for an Empty String
    }

    if ($caseInsensitive) {
        $string = strtolower($string); // Converting string to lowercase for case-insensitive check
    }

    $characters = str_split($string);
    $characterCount = count($characters);

    foreach ($characters as $i => $character) {
        if ($character !== $characters[$characterCount - ($i + 1)]) {
            return false;
        }
    }

    return true;
}
