<?php
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