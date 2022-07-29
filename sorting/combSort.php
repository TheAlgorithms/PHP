<?php
function combSort($my_array){
	$gap = count($my_array);
        $swap = true;
	while ($gap > 1 || $swap){
		if($gap > 1) $gap /= 1.25;
 		$swap = false;
		$i = 0;
		while($i+$gap < count($my_array)){
			if($my_array[$i] > $my_array[$i+$gap]){
				list($my_array[$i], $my_array[$i+$gap]) = array($my_array[$i+$gap],$my_array[$i]);
				$swap = true;
			}
			$i++;
		}
	}
	return $my_array;
}
$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array :\n";
echo implode(', ',$test_array );
echo "\nSorted Array\n:";
echo implode(', ',combSort($test_array)). PHP_EOL;
?>
