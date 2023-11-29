<?php

/*
 * This function will calculate the base of any number that is <11.
 * You can calculate binary, octal quickly with this as well.
 * For example, to calculate binary of number 4 you can run "echo baseX(4, 2);"
 * and for octal of number 10 you can run "echo baseX(10, 8);"
 *
 * @param int $k The number to convert
 * @param int $x The base to convert to
 * @author Sevada797 https://github.com/sevada797

 */
function baseX($k, $x)
{
    $arr = [];

    while (true) {
        array_push($arr, $k % $x);
        $k = ($k - ($k % $x)) / $x;

        if ($k == 0) {
            break;
        }
    }

    return implode("", array_reverse($arr));
}
