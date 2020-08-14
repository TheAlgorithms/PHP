<?php 
/**
 * link: https://github.com/TheAlgorithms/Algorithms-Explanation/blob/master/Basic%20Math/Average_Mean.md
 * title: Average (Mean)
 * description: Calculate the average of a list of numbers using mean.
*/


// Step 1: Input a list of numbers.
	echo "\n Rounded average mean: ";
	echo fn_average_mean([2, 4, 6, 8, 20, 50, 70]);
	echo "\n Average mean: ";
	echo fn_average_mean([2, 4, 6, 8, 20, 50, 70], true);
	echo "\n";


/**
 * Find average mean
 *
 * @param      array    $input_arr  Input a list of numbers.
 *
 * @return     integer  Return average mean.
 */
function fn_average_mean(array $input_arr, bool $is_round_output = false)
{

	$output_average = array_sum($input_arr) / count($input_arr); 
	return $is_round_output ? round($output_average) : $output_average;

}
