<?php

declare(strict_types=1);

// A mono-alphabetic cipher is a simple substitution cipher
// https://www.101computing.net/mono-alphabetic-substitution-cipher/

function monoAlphabeticCipher(string $key, $alphabet, $text): false|string
{
    $cipherText = ''; // the cipher text (can be decrypted and encrypted)

    // check if the text length matches
    if (strlen($key) !== strlen((string) $alphabet)) {
        return false;
    }

    $text = preg_replace('/\d+/', '', (string) $text); // remove all the numbers

    for ($i = 0; $i < strlen((string) $text); $i++) {
        $index = strripos((string) $alphabet, $text[$i]);
        if ($text[$i] === " ") {
            $cipherText .= " ";
        } else {
            $cipherText .= (ctype_upper($text[$i]) ? strtoupper($key[$index]) : $key[$index]);
        }
    }

    return $cipherText;
}

function maEncrypt($key, $alphabet, $text): string|false
{
    return monoAlphabeticCipher($key, $alphabet, $text);
}

function maDecrypt($key, $alphabet, $text): string|false
{
    return monoAlphabeticCipher($alphabet, $key, $text);
}
