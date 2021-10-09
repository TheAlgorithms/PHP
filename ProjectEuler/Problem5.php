<?php

/**
 * This function solves the problem 5 of the Project Euler.
 *
 * Problem description:
 * 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
 * What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?
 */
function problem5(): int
{
    $number = 21;
    while (true) {
        $isSolution = true;
        for ($i = 1; $i <= 21; $i++) {
            if ($number % $i !== 0) {
                $isSolution = false;
                break;
            }
        }
        if ($isSolution) {
            return $number;
        }
        $number++;
    }
}
