<?php

function isAnagram(string $originalString, string $testString, bool $caseInsensitive = true)
{
    if ($caseInsensitive) 
    {
        $originalString = strtolower($originalString); // Converting string to lowercase for case-insensitive check
        $testString = strtolower($testString);
    }

    //count_chars(string, mode = 1) returns key-value pairs with character as key, frequency as value
    //We can directly compare the arrays in this case
    if (count_chars($originalString, 1) == count_chars($testString, 1))
    {
        return true;
    }
    else
    {
        return false;
    }
}