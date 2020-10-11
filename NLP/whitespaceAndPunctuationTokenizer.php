<?php

require_once __DIR__ . '/../vendor/autoload.php';

use NlpTools\Tokenizers\WhitespaceAndPunctuationTokenizer;
 

function WhitespaceAndPunctuationTokenizer($text)
{
    
  /*
   * Whitespace And Punctuation Tokenizer using NLP Tools
   * 
   * @param String $text Input text

   * @return Array Array of tokens
   *
   * Examples:
   * $text = "Please allow me to introduce myself 
        I'm a man of wealth and taste"
   *
   * return: Array
                    (
                    [0] => Please
                    [1] => allow
                    [2] => me
                    [3] => to
                    [4] => introduce
                    [5] => myself
                    [6] => I
                    [7] => '
                    [8] => m
                    [9] => a
                    [10] => man
                    [11] => of
                    [12] => wealth
                    [13] => and
                    [14] => taste
                    )
   */
  
    $tok = new WhitespaceAndPunctuationTokenizer();
 
    return $tok->tokenize($text);
}
 

 