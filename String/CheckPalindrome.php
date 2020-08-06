<?php

function is_palindrome(string $string, bool $caseInsensitive = true)
{
    $string = trim($string); // Removing leading and trailing spaces

    if (empty($string)) {
        return false; // Returning false for an Empty String
    }

    if ($caseInsensitive) {
        $string = strtolower($string); // Converting string to lowercase for case-insensitive check
    }

    $characters = str_split($string);

    for ($i = 0; $i < count($characters); $i++) {
        if ($characters[$i] !== $characters[count($characters) - ($i + 1)]) {
            return false;
        }
    }

    return true;
}
