<?php

/**
 * Linear search in PHP
 * 
 * Reference: https://www.geeksforgeeks.org/linear-search/
 * 
 * @param Array $list a array of integers to search
 * @param integer $target an integer number to search for in the list
 * @return integer the index where the target is found (or -1 if not found)
 * 
 * Examples:
 * 
 *  data =  5, 7, 8, 11, 12, 15. 17, 18, 20
 *  
 *  x = 15
 *  Element found at position 6
 *  
 *  x = 1
 *  Element not found
 * 
 **/


function linear_search($list, $target) #Linear Search
  { $n = sizeof($list); 
    for($i = 0; $i < $n; $i++) 
    { 
        if($list[$i] == $target) 
            return $i+1; 
    } 
    return -1; 
   }
   
# DRIVER CODE
$data = array(5, 7, 8, 11, 12, 15. 17, 18, 20);  
$x = 15; 


$result = linear_search($data, $x); # OUTPUT DISPLAY
if($result == -1) 
    echo "Element not found"; 
else
    echo "Element found at position " , $result; 

?>
