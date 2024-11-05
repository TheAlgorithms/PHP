<?php
/**
 * The function loops through each character in the input string.
 * It uses an array $seen to keep track of characters that have already been added to the output string.
 * If a character hasn't been seen, it is appended to the result string, and the character is marked as seen.
 * The function returns the modified string with duplicate characters removed.
 */

 function removeDuplicatedCharacters($inputString) {
    // Initialize an empty array to keep track of seen characters
    $seen = [];
    
    // Initialize an empty string for the result
    $result = '';

    // Loop through each character in the input string
    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];
        
        // Check if the character has already been seen
        if (!in_array($char, $seen)) {
            // Add the character to the result and mark it as seen
            $result .= $char;
            $seen[] = $char;
        }
    }
    
    return $result;
}