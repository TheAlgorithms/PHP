<?php
/**
 * This function returns the character which is repeated maximum number of
 * times in the given string.
 *
 * @param string $string
 * @return string
 */
function maxCharacter(string $string)
{
    if (empty($string)) {
        throw new \Exception('Please pass a non-empty string value');
    }

    $characterCountTable = []; // A variable to maintain the character counts
    $string              = strtolower($string); // For case-insensitive checking
    $characters          = str_split($string); // Splitting the string to a Character Array.

    foreach ($characters as $character) {
        $currentCharacterCount = 1;

        if (isset($characterCountTable[$character])) {
            $currentCharacterCount = $characterCountTable[$character] + 1;
        }

        $characterCountTable[$character] = $currentCharacterCount;
    }

    arsort($characterCountTable);

    return array_keys($characterCountTable)[0];
}
