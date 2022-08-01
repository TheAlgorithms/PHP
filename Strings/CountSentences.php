<?php

/**
 * This is a simple way to count sentence
 * using php preg_match_all() function
 *
 * @param string $sentence
 * @return int
 */
function countSentences(string $sentence): int
{
    $sentence = trim($sentence);

    return preg_match_all('/[^\s|^\...](\.|\!|\?)(?!\w)/', $sentence);
}
