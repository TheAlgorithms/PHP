<?php
// A mono-alphabetic cipher is a simple substitution cipher
// https://www.101computing.net/mono-alphabetic-substitution-cipher/

function monoAlphabeticCipher($key, $alphabet, $text){

    $cipherText = ''; // the cipher text (can be decrypted and encrypted)

    if ( strlen($key) != strlen($alphabet) ) { return false; } // check if the text length matches
    $text = preg_replace('/[0-9]+/', '', $text); // remove all the numbers
    
    for( $i = 0; $i < strlen($text); $i++ ){
        $index = strripos( $alphabet, $text[$i] );
        if( $text[$i] == " " ){ $cipherText .= " "; }
        else{ $cipherText .= ( ctype_upper($text[$i]) ? strtoupper($key[$index]) : $key[$index] ); }
    }
    return $cipherText;
}

function maEncrypt($key, $alphabet, $text){

    return monoAlphabeticCipher($key, $alphabet, $text);

}

function maDecrypt($key, $alphabet, $text){

    return monoAlphabeticCipher($alphabet, $key, $text);

}

?> 