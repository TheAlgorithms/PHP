<?php

/**
 * Encrypt given text using ROT 13 cipher.
 *
 * @param string text text to be encrypted
 * @return string new encrypted text
 */
    function encrypt(string $text): string
    {
        $encryptedText = ''; // Empty string to store encrypted text
        foreach (str_split($text) as $c) { // Going through each character
            if (ctype_alpha($c)) {
                $placeValue = ord($c) - ord(ctype_upper($c) ? 'A' : 'a'); // Getting value of character (i.e. 0-25)
                $placeValue = ($placeValue + 13) % 26; // Applying encryption formula
                $placeValue += ord(ctype_upper($c) ? 'A' : 'a');
                $newChar = chr($placeValue); // Getting new character from new value (i.e. A-Z)
                $encryptedText .= $newChar; // Appending encrypted character
            } else {
                $encryptedText .= $c; // Appending the original character
            }
        }

        return $encryptedText; // Returning encrypted text
    }
/**
 * Decrypt given text using ROT 13 cipher.
 *
 * @param string text text to be Decrypted

 * @return string new Decrypted text
 */
    function decrypt(string $text): string
    {
        $decryptedText = ''; // Empty string to store decrypted text
        foreach (str_split($text) as $c) { // Going through each character
            if (ctype_alpha($c)) {
                $placeValue = ord($c) - ord(ctype_upper($c) ? 'A' : 'a'); // Getting value of character (i.e. 0-25)
                $placeValue = ($placeValue - 13) % 26; // Applying decryption formula
                if ($placeValue < 0) { // Handling case where remainder is negative
                    $placeValue += 26;
                }
                $placeValue += ord(ctype_upper($c) ? 'A' : 'a');
                $newChar = chr($placeValue); // Getting new character from new value (i.e. A-Z)
                $decryptedText .= $newChar; // Appending decrypted character
            } else {
                $decryptedText .= $c; // Appending the original character
            }
        }

        return $decryptedText; // Returning decrypted text
    }
?>