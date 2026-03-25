<?php

declare(strict_types=1);

/**
 * This is a simple way to check palindrome string
 * using php strrev() function
 * make it simple
 *
 * @throws \Exception
 */
function checkPalindromeString(string $string, bool $caseInsensitive = true): string
{
    //removing spaces
    $string = trim($string);

    if ($string === '' || $string === '0') {
        throw new \Exception('You are given empty string. Please give a non-empty string value');
    }

    /**
     * for case-insensitive
     * lowercase string conversion
     */
    if ($caseInsensitive) {
        $string = strtolower($string);
    }

    if ($string !== strrev($string)) {
        return $string . " - not a palindrome string." . PHP_EOL;
    }

    return $string . " - a palindrome string." . PHP_EOL;
}
