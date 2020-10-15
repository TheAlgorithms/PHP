<?php
 function counting_sort($my_array, $min, $max)
{
  $count = array();
  for($i = $min; $i <= $max; $i++)
  {
    $count[$i] = 0;
  }
 
  foreach($my_array as $number)
  {
    $count[$number]++; 
  }
  $z = 0;
  for($i = $min; $i <= $max; $i++) {
    while( $count[$i]-- > 0 ) {
      $my_array[$z++] = $i;
    }
  }
  return $my_array;
}
$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array :\n";
echo implode(', ',$test_array );
echo "\nSorted Array\n:";
echo implode(', ',counting_sort($test_array, -1, 5)). PHP_EOL;
?>
