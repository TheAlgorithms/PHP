<?php

function selectionSorting($array){
    $length=count($array);
    for ($i=0;$i<$length;$i++){
        $lowest=$i;
        for ($j=$i+1;$j<$length;$j++){
            if ($array[$j] < $array[$lowest]){
                $lowest=$j;
            }
        }
        if ($i !==$lowest){
            $temp=$array[$i];
            $array[$i]=$array[$lowest];
            $array[$lowest]=$temp;
        }

    }
    return $array;
}
