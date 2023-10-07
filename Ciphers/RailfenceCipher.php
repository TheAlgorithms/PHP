<?php

/**
 * Encode a message using the Rail Fence Cipher.
 * (https://en.wikipedia.org/wiki/Rail_fence_cipher)
 *
 * @param string $plainMessage The message to encode.
 * @param int $rails The number of rails or rows in the rail fence.
 *
 * @return string The encoded message.
 */
function encode($plainMessage, $rails): string
{
    $cipherMessage = [];
    $position = ($rails * 2) - 2;
    
    // Iterate through the characters of the plain message
    for ($index = 0; $index < strlen($plainMessage); $index++) {
        for ($step = 0; $step < $rails; $step++) {
            if (!isset($cipherMessage[$step])) {
                $cipherMessage[$step] = '';
            }
            // Check if the character should go in the rail
            if ($index % $position == $step || $index % $position == $position-$step) {
                $cipherMessage[$step] .= $plainMessage[$index];
            } else {
                // Add a placeholder for empty spaces
                $cipherMessage[$step] .= ".";
            }
        }
    }
    // Combine and remove placeholders to form the cipher message
    return implode('', str_replace('.', '', $cipherMessage));
}

/**
 * Decode a message encoded using the Rail Fence Cipher.
 *
 * @param string $cipherMessage The encoded message.
 * @param int $rails The number of rails or rows used for encoding.
 *
 * @return string The decoded plain message.
 */
function decode($cipherMessage, $rails): string
{
    $position = ($rails * 2) - 2;
    $textLength = strlen($cipherMessage);
    $minLength = floor($textLength / $position);
    $balance = $textLength % $position;
    $lengths = [];
    $strings = [];
    $totalLengths = 0;
    // Calculate the number of characters in each row
    for ($rowIndex = 0; $rowIndex < $rails; $rowIndex++) {
        $lengths[$rowIndex] = $minLength;
        if ($rowIndex != 0 && $rowIndex != ($rails - 1)) {
            $lengths[$rowIndex] += $minLength;
        }
        if ($balance > $rowIndex) {
            $lengths[$rowIndex]++;
        }
        if ($balance > ($rails + ($rails - $rowIndex) - 2)) {
            $lengths[$rowIndex]++;
        }
        $strings[] = substr($cipherMessage, $totalLengths, $lengths[$rowIndex]);
        $totalLengths += $lengths[$rowIndex];
    }
    // Convert the rows of characters to plain message
    $plainText = '';
    while (strlen($plainText) < $textLength) {
        for ($charIndex = 0; $charIndex < $position; $charIndex++) {
            if (isset($strings[$charIndex])) {
                $index = $charIndex;
            } else {
                $index = $position - $charIndex;
            }
            $plainText .= substr($strings[$index], 0, 1);
            $strings[$index] = substr($strings[$index], 1);
        }
    }
    return $plainText;
}

