<?php
// PHP program to find GCD of two or
// more numbers
 
// Function to return gcd of a and b
function gcd( $a, $b)
{
    if ($a == 0)
        return $b;
    return gcd($b % $a, $a);
}
 
// Function to find gcd of array of
// numbers
function findGCD($arr, $n)
{
    $result = $arr[0];
 
    for ($i = 1; $i < $n; $i++){
        $result = gcd($arr[$i], $result);
 
        if($result == 1)
        {
           return 1;
        }
    }
    return $result;
}
 
// Driver code
$arr = array( 2, 4, 6, 8, 16 );
$n = sizeof($arr);
echo (findGCD($arr, $n));
 
// This code is contributed by
// Prasad cheeshan
?>
