<?php

function isPrime(int $number)
{
    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0 or $number < 2) {
        return false;
    }

    $i = 3;
    while ($i < sqrt($number)) {
        if ($number % $i === 0) {
            return false;
        }
        $i += 2;
    }

    return true;
}
