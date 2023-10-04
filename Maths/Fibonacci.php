<?php

/**
 * Fibonacci recursive
 *
 * @param  int  $num
 * @return array
 * @throws \Exception
 */
function fibonacciRecursive(int $num)
{
    /*
     * Fibonacci series using recursive approach
     */

    $fibonacciRecursive = [];
    for ($i = 0; $i < $num; $i++) {
        array_push($fibonacciRecursive, recursive($i));
    }
    return $fibonacciRecursive;
}

/**
 * @param  int  $num
 * @return int
 * @throws \Exception
 */
function recursive(int $num)
{
    if ($num < 0) {
        throw new \Exception("Number must be greater than 0.");
    } else {
        if ($num == 0 || $num == 1) {
            return $num;
        } else {
            return recursive($num - 1) + recursive($num - 2);
        }
    }
}

/**
 * @throws \Exception
 */
function fibonacciWithBinetFormula(int $num)
{
    /*
     * Fibonacci series using Binet's formula given below
     * binet's formula =  ((1 + sqrt(5) / 2 ) ^ n - (1 - sqrt(5) / 2 ) ^ n ) ) / sqrt(5)
     * More about Binet's formula found at http://www.maths.surrey.ac.uk/hosted-sites/R.Knott/Fibonacci/fibFormula.html#section1
     */

    $fib_series = [];

    if ($num < 0) {
        throw new \Exception("Number must be greater than 0.");
    } else {
        $sqrt = sqrt(5);
        $phi_1 = (1 + $sqrt) / 2;
        $phi_2 = (1 - $sqrt) / 2;

        foreach (range(0, $num - 1) as $n) {
            $seriesNumber = (pow($phi_1, $n) - pow($phi_2, $n)) / $sqrt;
            array_push($fib_series, (int)$seriesNumber);
        }
    }

    return $fib_series;
}
