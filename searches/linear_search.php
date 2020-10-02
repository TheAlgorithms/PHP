
<?php 
// PHP code for linearly search x in arr[].  
// If x is present then return its location,  
// otherwise return -1  
  
function search($arr, $x) 
{ 
    $n = sizeof($arr); 
    for($i = 0; $i < $n; $i++) 
    { 
        if($arr[$i] == $x) 
            return $i; 
    } 
    return -1; 
} 
  
// Driver Code 
$arr = array(2, 3, 4, 10, 40);  
$x = 10; 
      
$result = search($arr, $x); 
if($result == -1) 
    echo "Element is not present in array"; 
else
    echo "Element is present at index " , 
                                 $result; 
?> 
