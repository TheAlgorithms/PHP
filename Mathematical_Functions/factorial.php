
<?php 
// PHP code to get the factorial of a number 
// function to get factorial in iterative way 
function Factorial($number){ 
    if($number <= 1){   
        return 1;   
    }   
    else{   
        return $number * Factorial($number - 1);   
    }   
} 
  
// Driver Code 
$number = 10; 
$fact = Factorial($number); 
echo "Factorial = $fact"; 
?> 
