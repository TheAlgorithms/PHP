<?php
// The XOR cipher is a type of additive cipher.
// Each character is bitwise XORed with the key.
// We loop through the input string, XORing each
// character with the key.
function xor_cipher(string $inp_string, string $key)
{

    $key_len = strlen($key);
    $result = array();

    for ($idx = 0;$idx < strlen($inp_string);$idx++)
    {
        array_push($result, $inp_string[$idx] ^ $key[$idx % $key_len]);
    }

    return join("", $result);
}
