<?php
/**
 * This function checks if given number is palindromic
 * e.g. 121
 * @param integer $input
 * @return boolean
 */
function isPalindrome(int $input): bool
{
  $arr = array_map('intval', str_split($input));
  $arrRev = array_reverse($arr);
  $inputRev = (int)implode("", $arrRev);
  if ($input == $inputRev) {
    return true;
  }
  else {
    return false;
  }
}
?>
