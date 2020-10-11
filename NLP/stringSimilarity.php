<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \NlpTools\Tokenizers\WhitespaceTokenizer;
use \NlpTools\Similarity\JaccardIndex;
use \NlpTools\Similarity\CosineSimilarity;
use \NlpTools\Similarity\Simhash;
 
/*
* String Similarity vectors using NlpTools.
*
* Example input: 
    $string1 = "Please allow me to introduce myself  I'm a man of wealth and tase";
    $string2 = "Hello, I love you, won't you tell me your name Hello, I love you, let me jump in your game";
*
*/

class StringSimilarity {

    // Properties
    public $string1;
    public $string2;
    public $cos;
    public $tok;
    public $J;
    public $simhash;
    public $setA;
    public $setB;

    // constructor
    function __construct($string1, $string2) {
        /**
         * Initialize the class
         *
         * @param String $string1 String input
         * @param String $string2 String input
         */

        $this -> tok = new WhitespaceTokenizer();
        
        $this -> setA = $tok->tokenize($string1);
        $this -> setB = $tok->tokenize($string2);
    }

    // Methods
    function Jaccard() {
        $J = new JaccardIndex();
        return $J->similarity(
            $this -> setA,
            $this -> setB
        )
    }

    function Cosine() {
        $cos = new CosineSimilarity();
        return $this -> cos->similarity(
            $this -> setA,
            $this -> setB
        )
    }

    function SimhashA() {
        $simhash = new Simhash(16); // 16 bits hash
        return $simhash ->simhash($this -> setA)
    }

    function Simhash() {
        $simhash = new Simhash(16); // 16 bits hash
        return $simhash->similarity(
            $this -> setA,
            $this -> setB
        )
    }

    function SimhashB() {
        $simhash = new Simhash(16); // 16 bits hash
        return $simhash->simhash($this -> setB)
    }


}