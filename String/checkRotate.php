<?php
// Php program to check if
// two given strings are
// rotations of each other
 
/* Function checks if passed
strings (str1 and str2) are
rotations of each other */
function areRotations($str1, $str2)
{
/* Check if sizes of two
   strings are same */
if (strlen($str1) != strlen($str2))
{
        return false;
}
 
$temp = $str1 + $str1;
if ($temp.count($str2)> 0)
{
        return true;
}
else
{
    return false;
}
}
 
// This code is contributed
// by cheeshan
?>
