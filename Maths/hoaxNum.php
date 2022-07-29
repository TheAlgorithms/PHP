<?php
// PHP code to check if a number
// is a hoax number or not.
 
// Function to find distinct prime
// factors of given number n
function primeFactors($n)
{
    $res = array();
    if ($n % 2 == 0)
    {
        while ($n % 2 == 0)
            $n = (int)$n / 2;
        array_push($res, 2);
    }
 
    // n is odd at this point, since
    // it is no longer divisible by 2.
    // So we can test only for the odd
    // numbers, whether they are factors of n
    for ($i = 3; $i <= sqrt($n); $i = $i + 2)
    {
 
        // Check if i is prime factor
        if ($n % $i == 0)
        {
            while ($n % $i == 0)
                $n = (int)$n / $i;
            array_push($res, $i);
        }
    }
 
    // This condition is to handle
    // the case when n is a prime
    // number greater than 2
    if ($n > 2)
        array_push($res, $n);
    return $res;
}
 
// Function to calculate sum
// of digits of distinct prime
// factors of given number n
// and sum of digits of number
// n and compare the sums obtained
function isHoax($n)
{
    // Distinct prime factors
    // of n are being stored
    // in vector pf
    $pf = primeFactors($n);
     
    // If n is a prime number,
    // it cannot be a hoax number
    if ($pf[0] == $n)
        return false;
     
    // Finding sum of digits of distinct
    // prime factors of the number n
    $all_pf_sum = 0;
    for ($i = 0; $i < count($pf); $i++)
    {
 
        // Finding sum of digits in
        // current prime factor pf[i].
        $pf_sum;
        for ($pf_sum = 0; $pf[$i] > 0;
              $pf_sum += $pf[$i] % 10,
                       $pf[$i] /= 10)
            ;
 
        $all_pf_sum += $pf_sum;
    }
 
    // Finding sum of digits of number n
    for ($sum_n = 0; $n > 0;
          $sum_n += $n % 10, $n /= 10)
        ;
 
    // Comparing the two calculated sums
    return $sum_n == $all_pf_sum;
}
 
// Driver Code
$n = 84;
if (isHoax($n))
    echo ("A Hoax Number\n");
else
    echo ("Not a Hoax Number\n");
     
// This code is contributed by
// Manish Shaw(manishshaw1)
?>
