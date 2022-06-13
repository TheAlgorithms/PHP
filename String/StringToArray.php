<?php

function string_to_array(string $sring)
{
	 if (empty($string)) {
        throw new \Exception('Please pass a non-empty string value');
    }

    $string          = trim($string);
    $items         = explode(' ', $string); 
    return $items; 
}
