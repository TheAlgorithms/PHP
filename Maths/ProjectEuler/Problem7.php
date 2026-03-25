<?php

declare(strict_types=1);

function problem7(): int
{
    $numberOfPrimes = 0;
    $number = 0;
    while ($numberOfPrimes < 10001) {
        $number++;
        if (isPrime($number)) {
            $numberOfPrimes++;
        }
    }

    return $number;
}
