<?php

/** Shell sort is an in-place comparison sort.
   * Starting with pairs of items that are far off from one another, the approach gradually closes the distance between the elements to be compared. 
   * Some out-of-place components may be brought into position more quickly than with a basic closest neighbour exchange by starting with far-off elements.

   * @param array $array 
   * @param $a
   * @param $b
   * @return array $array*/

function shellSort($array)
{
	$a = round(count($array)/2);
	while($a > 0)
	{
		for($b = $a; $b < count($array);$b++){
			$temp = $array[$b];
			$i = $b;
			while($i >= $a && $array[$i-$a] > $temp)
			{
				$array[$i] = $array[$i - $a];
				$i -= $a;
			}
			$array[$i] = $temp;
		}
		$a = round($a/2.2);
	}
	return $array;
}
?>
