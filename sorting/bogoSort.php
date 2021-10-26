<?php

function bogoSort($array) {
  $isSorted = false;

  while ($isSorted == false) {

    for ($i = 0; $i < count($array)-1; $i++) {
      if ($array[$i] > $array[$i + 1]) {
        $isSorted = false;
        break;
      }
      $isSorted = true;
    }

    if ($isSorted) {
      return $array;
    }

    shuffle($array);
  }
}

?>