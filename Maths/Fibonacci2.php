<?php

/*
 * Print Fibonacci sequence using a generator
 */

 /**
  * @param int $i number of Fibonacci numbers to generate
  * @param Generator $set Fibonacci calculator
  */
function loop(int $i, Generator $set): Generator
{
    while ($i-- > 0 && $set->valid()) {
        yield $set->current();
        $set->next();
    }
}

/*
 * Fibonacci generator
 */
function fib(): Generator
{
    yield $i = 0;
    yield $j = 1;

    while (true) {
        yield $k = $i + $j;
        $i = $j;
        $j = $k;
    }
}

/*
 * Generate 100 Fibonacci numbers
 */
foreach (loop(100, fib()) as $item) {
    print($item . ',');
}
