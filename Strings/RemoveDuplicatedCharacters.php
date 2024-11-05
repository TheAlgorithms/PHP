<?php

declare(strict_types=1);

/**
 * Removes duplicate characters from a string, retaining only the first occurrence of each character.
 *
 * @param string $inputString The input string from which duplicates will be removed.
 * @return string The modified string with duplicate characters removed.
 */

function removeDuplicatedCharacters(string $inputString): string
{
    // Initialize an empty array to keep track of seen characters
    $seen = [];

    // Initialize an empty string for the result
    $result = '';

    // Loop through each character in the input string
    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];

        // Check if the character has already been seen
        if (!in_array($char, $seen, true)) {
            // Add the character to the result and mark it as seen
            $result .= $char;
            $seen[] = $char;
        }
    }

    return $result;
}
