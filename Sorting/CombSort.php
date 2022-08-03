<?php

/**  Comb Sort
  * The difference utilised in comparisons and exchanges is widened.  
  * Eliminating little values at the end of the list, is the core principle.
   
   * @param array $array 
   * @param $g
   * @param $s
   * @return array $array*/



function combSort($array){
	$g = count($array);
        $s = true;
	while ($g > 1 || $s){
		if($g > 1) $g /= 1.25;
 		$s = false;
		$j = 0;
		while($j+$g < count($array)){
			if($array[$j] > $array[$j+$g]){
				list($array[$j], $array[$j+$g]) = array($array[$j+$g],$array[$j]);
				$s = true;
			}
			$j++;
		}
	}
	return $array;
}
?>