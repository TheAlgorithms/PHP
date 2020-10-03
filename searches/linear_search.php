<?php
  function linear_search($list, $target)
  { $n = sizeof($list); 
    for($i = 0; $i < $n; $i++) 
    { 
        if($list[$i] == $target) 
            return $i; 
    } 
    return -1; 
   }
   

$data = array(5, 7, 8, 11, 12, 15. 17, 18, 20);  
$x = 15; 


$result = linear_search($data, $x); 
if($result == -1) 
    echo "Element not found"; 
else
    echo "Element found at position " , $result; 


#Reference: https://www.geeksforgeeks.org/linear-search/
?>
