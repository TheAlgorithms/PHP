<?php
/**
   * Jump Search algorithm in PHP
   * References: https://www.geeksforgeeks.org/jump-search/
   * The list must be sorted in ascending order before performing jumpSearch
   *
   * @param Array $list refers to a sorted list of integer 
   * @param integer $key refers to the integer target to be searched from the sorted list
   * @return index of $key if found, otherwise -1 is returned
 */
   
function jumpSearch($list,$key)
{
	/*number of elements in the sorted array*/
	$num = count($list);
	/*block size to be jumped*/
	$step = (int)sqrt($num);
	$prev = 0;
	
	while ($list[min($step, $num)-1] < $key)
	{
		$prev = $step;
		$step += (int)sqrt($num);
		if ($prev >= $num)
			return -1;
	}

	/*Performing linear search for $key in block*/
	while ($list[$prev] < $key)
	{
		$prev++;
		if ($prev == min($step, $num))
			return -1;
	}
	
     return $list[$prev] === $key ? $prev : -1;
}


/* 
 *Test jumpSearch
 */
$list = array( 3,5,6,7,9,10,12,20,22,24 );
$key=10;

/*Print out index of $key in the sorted list*/
echo "The index of ".$key." is ".jumpSearch($list,$key);
return 0;

?>
