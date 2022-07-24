<?php

/**
 * Encode text to Morse Code.
 * @param string text to encode
 */
function encode(string $text): string
{
    $text = strtoupper($text); // Makes sure the string is uppercase
    $MORSE_CODE = array( // Array containing morse code translations
        "A" => ".-",
        "B" => "-...",
        "C" => "-.-.",
        "D" => "-..",
        "E" => ".",
        "F" => "..-.",
        "G" => "--.",
        "H" => "....",
        "I" => "..",
        "J" => ".---",
        "K" => "-.-",
        "L" => ".-..",
        "M" => "--",
        "N" => "-.",
        "O" => "---",
        "P" => ".--.",
        "Q" => "--.-",
        "R" => ".-.",
        "S" => "...",
        "T" => "-",
        "U" => "..-",
        "V" => "...-",
        "W" => ".--",
        "X" => "-..-",
        "Y" => "-.--",
        "Z" => "--..",
        "1" => ".----",
        "2" => "..---",
        "3" => "...--",
        "4" => "....-",
        "5" => ".....",
        "6" => "-....",
        "7" => "--...",
        "8" => "---..",
        "9" => "----.",
        "0" => "-----",
        " " => "/"
    );

    $encodedText = ""; // Stores the encoded text
    foreach (str_split($text) as $c) { // Going through each character
        if (array_key_exists($c, $MORSE_CODE)) { // Checks if it is a valid character
            $encodedText .= $MORSE_CODE[$c] . " "; // Appends the correct character
        } else {
            throw new \Exception("Invalid character: $c");
        }
    }
    substr_replace($encodedText ,"", -1); // Removes trailing space
    return $encodedText;
}

/**
 * Decode Morse Code to text.
 * @param string text to decode
 */
function decode(string $text): string
{
    $MORSE_CODE = array( // An array containing morse code to text translations
        ".-" => "A",
        "-..." => "B",
        "-.-." => "C",
        "-.." => "D",
        "." => "E",
        "..-." => "F",
        "--." => "G",
        "...." => "H",
        ".." => "I",
        ".---" => "J",
        "-.-" => "K",
        ".-.." => "L",
        "--" => "M",
        "-." => "N",
        "---" => "O",
        ".--." => "P",
        "--.-" => "Q",
        ".-." => "R",
        "..." => "S",
        "-" => "T",
        "..-" => "U",
        "...-" => "V",
        ".--" => "W",
        "-..-" => "X",
        "-.--" => "Y",
        "--.." => "Z",
        ".----" => "1",
        "..---" => "2",
        "...--" => "3",
        "....-" => "4",
        "....." => "5",
        "-...." => "6",
        "--..." => "7",
        "---.." => "8",
        "----." => "9",
        "-----" => "0",
        "/" => " "
    );

    $decodedText = ""; // Stores the decoded text
    foreach (explode(" ", $text) as $c) { // Going through each group
        if (array_key_exists($c, $MORSE_CODE)) { // Checks if it is a valid character
            $decodedText .= $MORSE_CODE[$c]; // Appends the correct character
        } else {
            if ($c) { // Makes sure that the string is not empty to prevent trailing spaces or extra spaces from breaking this
                throw new \Exception("Invalid character: $c");
            }
        }
    }
    return $decodedText;
}
