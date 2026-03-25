<?php

declare(strict_types=1);

function problem2(): int
{
    $maxNumber = 4000000;
    $currNumber = 1;
    $nextNumber = 2;
    $answer = 0;

    while ($currNumber <= $maxNumber) {
        $answer += $currNumber % 2 == 0 ? $currNumber : 0;
        [$currNumber, $nextNumber] = [$nextNumber, $currNumber + $nextNumber];
    }

    return $answer;
}
