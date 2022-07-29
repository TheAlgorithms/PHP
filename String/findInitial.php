<?php
// php program to print initials of a name
 
function printInitials($name)
{
    if (strlen($name) == 0)
        return;
 
    // Since toupper() returns int, we do typecasting
    echo strtoupper($name[0]);
 
    // Traverse rest of the string and print the
    // characters after spaces.
    for ($i = 1; $i < strlen($name) - 1; $i++)
        if ($name[$i] == ' ')
            echo " " . strtoupper($name[$i + 1]);
}
 
// This code is contributed by cheeshan
?>
