<?php

function is_perfect_square($number)
{
    $root = (int) sqrt($number);
    return (($root * $root) === $number); // If number's square root is an integer then it's a perfect square else not
}
