<?php
/**
 * Interpolation Search********
 * 
 * 
 * Description***********
 * Searches for a key in a sorted array
 * 
 * 
 * How************
 * Loop through the array:
 * Determine the index from the low and high indices
 * if the (value of index in array) is = key return the "POSITION", end loop
 * if the (value of index in array) is < key increase the low index
 * if the (value of index in array) is > key decrease the high index
 * repeat the loop
 */
function interpolationSearch($arr, $key) {
  $length = count($arr) - 1;
  $low = 0;
  $high = $length;
  $position = -1;
  //loop, between low & high
  while ($low <= $high && $key >= $arr[$low] && $key <= $arr[$high]) {
    //GET INDEX
    $delta = ($key - $arr[$low]) / ($arr[$high] - $arr[$low]);
    $index = $low + floor(($high - $low) * $delta);
    //GET VALUE OF INDEX IN ARRAY...
    $indexValue = $arr[$index];
    if ($indexValue === $key) {
      //index value equals key
      //FOUND TARGET
      //return index value
      $position = $index;
      return (int) $position;
    }
    if ($indexValue < $key) {
      //index value lower than key
      //increase low index
      $low = $index + 1;
    } 
    if ($indexValue > $key) {
      //index value higher than key
      //decrease high index
      $high = $index - 1;
    }
  }
  //when key not found in array or array not sorted
  return null;
}