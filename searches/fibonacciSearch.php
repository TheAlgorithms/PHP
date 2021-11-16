<?php

/*
 * Function to find nth number in Fibonaccu sequence.
 * Uses a version of memoization and runs very fast!
 */

/**
 * @param int $n position to check
 * @param array $m array to store solved trees
 */
function fibonacciPosition($n, array &$m = [])
{
    if(isset($m[$n])) return $m[$n];
    if($n < 2) return $n;

    $m[$n] = fibonacciPosition($n - 1, $m) + fibonacciPosition($n - 2, $m);

    return $m[$n];

}

print fibonacciPosition(59);
