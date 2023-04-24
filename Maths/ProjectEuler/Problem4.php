<?php

/**
 * Problem:
 * A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is 9009 = 91 × 99.
 * Find the largest palindrome made from the product of two 3-digit numbers.
 */

/**
 * @return int
 */
function problem4(): int
{
    $largest  = 0;

    for ($i=100; $i<1000; $i++){

        for ($j=$i; $j<1000; $j++) {
            $product = $i*$j;

            if ( strrev((string)$product) == (string)$product && $product > $largest) {
                $largest = $product;
            }
        }
    }

    return $largest;
}
