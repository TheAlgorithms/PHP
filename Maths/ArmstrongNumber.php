<?php

/**
 * This function checks if given number is Armstrong
 * e.g. 153
 * @param integer $input
 * @return boolean
 */
function isNumberArmstrong(int $input): bool
{
    $arr = array_map('intval', str_split($input));
    $sumOfCubes = 0;
    foreach ($arr as $num) {
        $sumOfCubes += $num * $num * $num;
    }
    return $sumOfCubes === $input;
}
