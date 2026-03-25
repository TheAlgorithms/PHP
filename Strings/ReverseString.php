<?php

declare(strict_types=1);

/**
 * This function returns a given string in reverse order
 */
function reverseString(string $string): string
{
    $string = trim($string); // Removing leading and trailing spaces

    $characters = str_split($string);

    $reversedCharacters = [];

    for ($i = (count($characters) - 1); $i >= 0; $i--) {
        $reversedCharacters[] = $characters[$i];
    }

    return implode('', $reversedCharacters);
}
