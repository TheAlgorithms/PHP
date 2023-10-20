<?php

/*
This function will calculate base of any number that is <11
You can calculate binary, octal quickly with this as well
For ex. to calculate binary of number 4 you can run "echo basex(4, 2);" and for octal of 
number let's say 10 you can run "echo basex(10, 8);" 
*/

function basex($k, $x) {
$arr=[];
while (true)
{
array_push($arr, $k%$x);
$k=($k-($k%$x))/$x;
if ($k==0) {
break;
}
}
return implode("", array_reverse($arr));
}
?>
