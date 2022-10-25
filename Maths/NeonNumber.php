<?php
function isNumberNeon($input)
{
  $inputSquare = $input * $input;
  $inputArr = array_map('intval', str_split($inputSquare));
  $sumOfSquareDigits =0;
  foreach ($inputArr as $digit) {
    $sumOfSquareDigits +=$digit;
  }
  return $sumOfSquareDigits ==$input;
}
?>
