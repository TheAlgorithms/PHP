<?php

function fib($n)
{
    return $n < 2 ? $n : fib($n - 1) + fib($n - 2);
}

function fibpos($n, &$m = [])
{
    if(isset($m[$n]))
    {
        return $m[$n];
    }

    if($n < 2)
    {
        return $n;
    }

    $m[$n] = fibpos($n - 1, $m) + fibpos($n - 2, $m);

    return $m[$n];

}

$memoize = function($func)
{
    return function() use ($func)
    {
        static $cache = [];

        $args = func_get_args();
        $key = md5(serialize($args));
        
        if(!isset($cache[$key]))
        {
            $cache[$key] = call_user_func_array($func, $args);
        }

        return $cache[$key];
    };
};

$fibpos = $memoize(function($n) use (&$fibpos)
{
    return $n < 2 ? $n : $fibpos($n -1) + $fibpos($n - 2);
});

// print fib(8);
// print $fibpos(40);
print fibpos(80);
