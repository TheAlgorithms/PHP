<?php
// Program to generate mersenne primes
 
// Generate all prime numbers less than n.
function SieveOf($n)
{
    // Initialize all entries of boolean
    // array as true. A value in prime[i]
    // will finally be false if i is Not
    // a prime, else true
    $prime = array($n + 1);
    for ($i = 0; $i <= $n; $i++)
        $prime[$i] = true;
 
    for ($p = 2; $p * $p <= $n; $p++)
    {
        // If prime[p] is not changed,
        // then it is a prime
        if ($prime[$p] == true)
        {
            // Update all multiples of p
            for ($i = $p * 2; $i <= $n; $i += $p)
                $prime[$i] = false;
        }
    }
    return $prime;
}
 
// Function to generate mersenne
// primes less than or equal to n
function mersennePrimes($n)
{
    // Create a boolean array "prime[0..n]"
    // bool prime[n+1];
 
    // Generating primes using Sieve
    $prime = SieveOf($n);
 
    // Generate all numbers of the
    // form 2^k - 1 and smaller
    // than or equal to n.
    for ($k = 2; ((1 << $k) - 1) <= $n; $k++)
    {
        $num = (1 << $k) - 1;
 
        // Checking whether number is prime
        // and is one less then the power of 2
        if ($prime[$num])
            echo $num . " ";
 
    }
}
 
// This code is contributed by cheeshan
?>
