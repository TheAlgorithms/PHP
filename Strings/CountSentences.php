<?php

/**
 * This is a simple way to count sentence 
 * using php preg_match_all() function 
 * @param string $sentence
 */

function countSentences(string $sentence): int
{
    $sentence = trim($sentence);

    return preg_match_all('/[^\s|^\...](\.|\!|\?)(?!\w)/', $sentence);
}


// example
echo countSentences("Hi! Hello world."); // returns 2
echo PHP_EOL;
echo countSentences("i am testing. test...."); // returns 2
echo PHP_EOL;
echo countSentences("How are you?"); // returns 1
echo PHP_EOL;
