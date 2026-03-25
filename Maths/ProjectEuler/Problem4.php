<?php

declare(strict_types=1);

function problem4(): int
{
    $largest  = 0;

    for ($i = 100; $i < 1000; $i++) {
        for ($j = $i; $j < 1000; $j++) {
            $product = $i * $j;

            if (strrev((string)$product) === (string)$product && $product > $largest) {
                $largest = $product;
            }
        }
    }

    return $largest;
}
