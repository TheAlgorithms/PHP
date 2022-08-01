<?php

/**
 * This is a simple way to check palindrome string
 * using php strrev() function
 * make it simple
 *
 * @param string $string
 * @param bool $caseInsensitive
 */
function checkPalindromeString(string $string, bool $caseInsensitive = true): String
{
    //removing spaces
    $string = trim($string);

    if (empty($string))
    {
        throw new \Exception('You are given empty string. Please give a non-empty string value');
    }

    /**
     * for case-insensitive
     * lowercase string conversion
     */
    if ($caseInsensitive)
    {
        $string = strtolower($string);
    }

    if ($string !== strrev($string))
    {
        return $string . " - not a palindrome string." . PHP_EOL;
    }

    return $string . " - a palindrome string." . PHP_EOL;
}
