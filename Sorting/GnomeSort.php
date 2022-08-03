<?php

/**
 * Gnome Sort
 * References:
 * https://www.geeksforgeeks.org/gnome-sort-a-stupid-one/
 * 
 * The Gnome algorithm works by locating the first instance in which two adjoining elements are arranged incorrectly and swaps with each other.
 * 
 * @param array $array refers to the array to be sorted
 * @return array
 */

function gnomeSort($array){
    $a = 1;
    $b = 2;

    while($a < count($array)){

        if ($array[$a-1] <= $array[$a]){
            $a = $b;
            $b++;
        }else{
            list($array[$a],$array[$a-1]) = array($array[$a-1],$array[$a]);
            $a--;
            if($a == 0){
                $a = $b;
                $b++;
            }
        }
    }

    return $array;
}
