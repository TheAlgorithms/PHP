<?php
// PHP program to find LCM of two numbers
 
// Recursive function to
// return gcd of a and b
function gcd( $a, $b)
{
   if ($a == 0)
        return $b;
    return gcd($b % $a, $a);
}
 
// Function to return LCM
// of two numbers
function lcm( $a, $b)
{
    return ($a / gcd($a, $b)) * $b;
}
 
    // Driver Code
    $a = 15;
    $b = 20;
    echo "LCM of ",$a, " and "
         ,$b, " is ", lcm($a, $b);
 
// This code is contributed by cheeshan
?>
