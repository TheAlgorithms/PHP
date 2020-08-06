<?php

function reverse_words(string $text)
{
    $text          = trim($text);
    $words         = explode(' ', $text);
    $reversedWords = [];
    for ($i = (count($words) - 1); $i >= 0; $i--) {
        $reversedWords[] = $words[$i];
    }
    return implode(' ', $reversedWords);
}
