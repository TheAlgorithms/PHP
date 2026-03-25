<?php

declare(strict_types=1);

function problem3(): int
{
    $n = 600851475143;
    $i = 2;
    while ($i * $i < $n) {
        while ($n % $i == 0) {
            $n /= $i;
        }

        $i++;
    }

    return $n;
}
