<?php

/**
 * Encrypts a plaintext using the Vigenère cipher.
 * (https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher)
 *
 * @param string $plaintext The plaintext to be encrypted.
 * @param string $key The encryption key.
 * @return string The encrypted text.
 */
function vigenere_encrypt($plaintext, $key): string
{
    // Convert the input to uppercase for consistency
    $plaintext = strtoupper($plaintext);
    $key = strtoupper($key);
    $keyLength = strlen($key);
    $encryptedText = "";
    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];
        if (ctype_alpha($char)) {
            // Calculate the shift based on the key
            $shift = ord($key[$i % $keyLength]) - ord('A');
            // Apply the Vigenère encryption formula
            $encryptedChar = chr(((ord($char) - ord('A') + $shift) % 26) + ord('A'));
            // Append the encrypted character to the result
            $encryptedText .= $encryptedChar;
        } else {
            // If the character is not alphabetic, leave it unchanged
            $encryptedText .= $char;
        }
    }
    return $encryptedText;
}

/**
 * Decrypts a ciphertext using the Vigenère cipher.
 *
 * @param string $ciphertext The ciphertext to be decrypted.
 * @param string $key The decryption key.
 * @return string The decrypted text.
 */
function vigenere_decrypt($ciphertext, $key): string
{
    $ciphertext = strtoupper($ciphertext);
    $key = strtoupper($key);
    $keyLength = strlen($key);
    $decryptedText = "";
    for ($i = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];
        if (ctype_alpha($char)) {
            // Calculate the shift based on the key
            $shift = ord($key[$i % $keyLength]) - ord('A');
            // Apply the Vigenère decryption formula
            $decryptedChar = chr(((ord($char) - ord('A') - $shift + 26) % 26) + ord('A'));
            // Append the decrypted character to the result
            $decryptedText .= $decryptedChar;
        } else {
            // If the character is not alphabetic, leave it unchanged
            $decryptedText .= $char;
        }
    }
    return $decryptedText;
}
