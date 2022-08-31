<?php 
// PHP program to implement interpolation search 

// If x is present in arr[0..n-1], then returns  
// index of it, else returns -1.  
function interpolationSearch($arr, $x, $n) 
{ 
    // Find indexes of two corners 
    $l = 0; $h = $n - 1; 

    // Since array is sorted, an element present 
    // in array must be in range defined by corner 
    while ($l <= $h and $x >= $arr[$l] and
                        $x <= $arr[$h]) 
    { 
        if ($l == $h) 
        { 
              if ($arr[$l] == $x) return $l; 
              return -1; 
        } 

        // Probing the position with keeping 
        // uniform distribution in mind. 
        $m = intval($l + (($x - $arr[$l]) * ($h - $l) /  
                               ($arr[$h] - $arr[$l]))); 

        // Condition of target found 
        if ($arr[$m] == $x)  
        { 
            return $m; 
        } 

        // If x is larger, x is in upper part 
        elseif ($arr[$m] < $x) 
        { 
            $l = $m + 1; 
        }  

        // If x is smaller, x is in the lower part 
        else
        { 
            $h = $m - 1; 
        } 
    } 

    return -1; 
} 
