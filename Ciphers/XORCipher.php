<?php
/* The XOR cipher is a type of additive cipher.
 * Each character is bitwise XORed with the key.
 * We loop through the input string, XORing each
 * character with the key.
 * The key is repeated until it is the same length as the input.
 *
 * @param string $input The input string.
 * @param string $key The key to use.
 * @return string The encrypted string.
 */
 */
function xorCipher(string $input_string, string $key)
{

    $key_len = strlen($key);
    $result = array();

    for ($idx = 0; $idx < strlen($input_string); $idx++)
    {
        array_push($result, $input_string[$idx] ^ $key[$idx % $key_len]);
    }

    return join("", $result);
}
