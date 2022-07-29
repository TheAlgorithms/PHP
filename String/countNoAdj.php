<?php
// php program to construct a n length
// string with k distinct characters
// such that no two same characters
// are adjacent.
 
// Function to find a string of length
// n with k distinct characters.
function findString($n, $k)
{
    // Initialize result with first k
    // Latin letters
    $res = "";
    for ($i = 0; $i < $k; $i++)
        $res = $res . chr(ord('a') + $i);
 
    // Fill remaining n-k letters by
    // repeating k letters again and
    // again.
    $count = 0;
    for ($i = 0; $i < $n - $k; $i++)
    {
        $res = $res . chr(ord('a')
                          + $count);
        $count++;
        if ($count == $k)
            $count = 0;
    }
    return $res;
}
 
// This code is contributed by cheeshan
?>
