<?php

declare(strict_types=1);

function isNumberNeon($input): bool
{
    $inputSquare = $input * $input;
    $inputArr = array_map('intval', str_split((string) $inputSquare));
    $sumOfSquareDigits = 0;
    foreach ($inputArr as $digit) {
        $sumOfSquareDigits += $digit;
    }

    return $sumOfSquareDigits == $input;
}
