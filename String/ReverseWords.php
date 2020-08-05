<?php

function reverse_words(string $text)
{
    $text         = trim($text);
    $words        = explode(' ', $text);
    $reverseWords = array_reverse($words);
    return implode(' ', $reverseWords);
}
