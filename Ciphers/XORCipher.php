<?php

/**
 * The XOR cipher is a type of additive cipher.
 * Each character is bitwise XORed with the key.
 * We loop through the input string, XORing each
 * character with the key.
 * The key is repeated until it is the same length as the input.
 *
 * @param string $inputString The input string.
 * @param string $key The key to use.
 * @return string The encrypted string.
 */
function xorCipher(string $inputString, string $key): string
{
    $key_len = strlen($key);
    $result = [];
    $inputLength = strlen($inputString);

    for ($idx = 0; $idx < $inputLength; $idx++) {
        $result[] = $inputString[$idx] ^ $key[$idx % $key_len];
    }

    return implode("", $result);
}
