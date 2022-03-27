<?php

function reverse_words(string $text)
{
    $text          = trim($text);
    $words         = explode(' ', $text);
    $reversedWords = array_reverse($words);
    return implode(' ', $reversedWords);
}
