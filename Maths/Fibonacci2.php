<?php

/*
 * Print Fibocanni sequence using a generator
 */

 /**
  * @param int $i number of Fibonacci numbers to generate
  * @param Generator $set Fibonacci calculator
  */
function loop($i, Generator $set)
{
    while ($i-- > 0 && $set->valid()) {
        yield $set->current();
        $set->next();
    }
}

/*
 * Fibonacci generator
 */
function fib()
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
