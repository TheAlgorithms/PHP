<?php

/**
 * This function returns a given sentence with its words
 * in reverse order
 *
 * @param  string  $text
 * @return string
 */
function reverseWords(string $text)
{
    $text          = trim($text);
    $words         = explode(' ', $text);
    $reversedWords = [];

    for ($i = (count($words) - 1); $i >= 0; $i--) {
        $reversedWords[] = $words[$i];
    }

    return implode(' ', $reversedWords);
}
