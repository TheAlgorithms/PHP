<?php

/**
 * This function returns a given string in reverse order
 *
 * @param string $string
 * @return string
 */
function reverseString(string $string)
{
    $string = trim($string); // Removing leading and trailing spaces

    $characters = str_split($string);

    $reversedCharacters = [];

    for ($i = (count($characters) - 1); $i >= 0; $i--) {
        $reversedCharacters[] = $characters[$i];
    }

    return implode('', $reversedCharacters);
}
