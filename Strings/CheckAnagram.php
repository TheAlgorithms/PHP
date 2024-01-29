<?php

/**
 * Checks if two strings are anagrams of each other.
 *
 * @param string $originalString
 * @param string $testString
 * @param bool $caseInsensitive
 * @return bool
 */
function isAnagram(string $originalString, string $testString, bool $caseInsensitive = true)
{
    if ($caseInsensitive) {
        $originalString = strtolower($originalString);
        $testString = strtolower($testString);
    }

    if (strlen($originalString) !== strlen($testString)) {
        return false; 
    }

    return count_chars($originalString, 1) === count_chars($testString, 1);
}
