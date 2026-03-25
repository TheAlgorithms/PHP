<?php

declare(strict_types=1);

/**
 * This function checks if given number is palindromic
 * e.g. 121
 */
function isNumberPalindromic(int $input): bool
{
    $arr = array_map('intval', str_split((string) $input));
    $arrRev = array_reverse($arr);
    $inputRev = (int)implode("", $arrRev);
    return $input === $inputRev;
}
