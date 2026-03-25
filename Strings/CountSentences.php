<?php

declare(strict_types=1);

/**
 * This is a simple way to count sentence
 * using php preg_match_all() function
 */
function countSentences(string $sentence): int
{
    $sentence = trim($sentence);

    return preg_match_all('/[^\s|^\...](\.|\!|\?)(?!\w)/', $sentence);
}
