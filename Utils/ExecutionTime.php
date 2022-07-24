<?php

/*
 * Run script and test execution time with following script
        $executionTime = New ExecutionTime();
        print_r(fibonacciRecursive(10));
 */
class ExecutionTime
{
    private $start_time = 0;
    private $end_time = 0;
    private $execution_time = 0;

    public function __construct()
    {
        $this->start_time = microtime(true);
    }

    public function __destruct()
    {
        $this->end_time = microtime(true);
        $this->execution_time = $this->end_time - $this->start_time;
        echo "Executed in $this->execution_time seconds\n";
    }
}
