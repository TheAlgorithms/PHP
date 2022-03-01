<?php

$mk = array();

$graph = [
    "1" => ["2" ,"3", "4"],
    "2" => ["3", "4"],
    "3" => [4]
];

function dfs($nod){

    //Check if the node is already visited, if it is already visited the function returns, else, it marks the node and process it
    if(array_key_exists($nod, $mk)){
        return;
    }
    array_push($nod, $mk);

    //Process the node

    echo $nod;


    //Explore the node neighbors
    foreach ($graph as $list) {
        foreach ($list as $node) {
            dfs($node);
        }
    }

}