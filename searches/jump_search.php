
<?php  
function jumpSearch($arr, $x, $n) 
{ 
    // Finding block size to be jumped 
    $step = sqrt($n); 
  
    // Finding the block where element is 
    // present (if it is present) 
    $prev = 0; 
    while ($arr[min($step, $n)-1] < $x) 
    { 
        $prev = $step; 
        $step += sqrt($n); 
        if ($prev >= $n) 
            return -1; 
    } 
  
    // Doing a linear search for x in block 
    // beginning with prev. 
    while ($arr[$prev] < $x) 
    { 
        $prev++; 
  
        // If we reached next block or end of 
        // array, element is not present. 
        if ($prev == min($step, $n)) 
            return -1; 
    } 
    // If element is found 
    if ($arr[$prev] == $x) 
        return $prev; 
  
    return -1; 
} 
  
// Driver program to test function 
$arr = array( 0, 1, 1, 2, 3, 5, 8, 13, 21, 
                34, 55, 89, 144, 233, 377, 610 ); 
$x = 55; 
$n = sizeof($arr) / sizeof($arr[0]); 
      
// Find the index of '$x' using Jump Search 
$index = jumpSearch($arr, $x, $n); 
  
// Print the index where '$x' is located 
echo "Number ".$x." is at index " .$index; 
return 0; 
?> 
