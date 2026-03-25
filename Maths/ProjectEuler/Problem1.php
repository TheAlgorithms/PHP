<?php

declare(strict_types=1);

function problem1a(): int
{
    $maxNumber = 999; // below 1000

    $numbers = range(1, $maxNumber);

    return array_reduce($numbers, function ($carry, $number): float|int {
        $shouldCarry = $number % 3 == 0 || $number % 5 == 0;
        return $carry + ($shouldCarry ? $number : 0);
    });
}

function problem1b(): int
{
    $maxNumber = 999; // below 1000

    $numbersMultByThree = range(3, $maxNumber, 3);
    $numbersMultByFive = range(5, $maxNumber, 5);

    $numbers = array_merge($numbersMultByThree, $numbersMultByFive);

    return array_sum(array_unique($numbers));
}
