<?php

declare(strict_types=1);

function problem5(): int
{
    $number = 20;
    while (true) {
        $isSolution = true;
        for ($i = 11; $i <= 20; $i++) {
            if ($number % $i !== 0) {
                $isSolution = false;
                break;
            }
        }

        if ($isSolution) {
            return $number;
        }

        $number += 20;
    }
}
