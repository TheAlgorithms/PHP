<?php
// Function to encrypt plaintext using Vigenère cipher
function vigenere_encrypt($plaintext, $key) {
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

// Function to decrypt ciphertext using Vigenère cipher
function vigenere_decrypt($ciphertext, $key) {
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
?>
