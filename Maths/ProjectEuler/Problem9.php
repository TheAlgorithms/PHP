<?php

declare(strict_types=1);

function problem9(): int
{
    for ($i = 0; $i <= 300; $i++) {
        for ($j = 0; $j <= 400; $j++) {
            $k = 1000 - $i - $j;
            if ($i * $i + $j * $j === $k * $k) {
                return $i * $j * $k;
            }
        }
    }

    return 0;
}
