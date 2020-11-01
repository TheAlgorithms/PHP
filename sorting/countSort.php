<?php


/**
 * @param $array
 * @param $min
 * @param $max
 * @return mixed
 */
function countSort($array, $min, $max)
{
    $count = array();
    for($i = $min; $i <= $max; $i++)
    {
        $count[$i] = 0;
    }

    foreach($array as $number)
    {
        $count[$number]++;
    }
    $z = 0;
    for($i = $min; $i <= $max; $i++) {
        while( $count[$i]-- > 0 ) {
            $array[$z++] = $i;
        }
    }
    return $array;
}
