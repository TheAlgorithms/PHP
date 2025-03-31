<?php

/**
 * @param $array
 * @return mixed
 */
function countSort($array)
{
    $count = [];
    $min = min($array);
    $max = max($array);

    for ($i = $min; $i <= $max; $i++) {
        $count[$i] = 0; // TODO: $count not used, this needs checking
    }

    foreach ($array as $number) {
        $count[$number]++; // TODO: $count not used, this needs checking
    }

    $z = 0;

    for ($i = $min; $i <= $max; $i++) {
        while ($count[$i]-- > 0) { // TODO: $count not used, this needs checking
            $array[$z++] = $i;
        }
    }

    return $array;
}
