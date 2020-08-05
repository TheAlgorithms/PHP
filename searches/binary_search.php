<?php
function binarySearchIterative($list, $target)
{
  /*
   * Binary search algorithm in PHP
   *
   * Be careful collection must be ascending sorted, otherwise result will be unpredictable
   *
   * @param Array $list a sorted array list of integers to search
   * @param integer $target an integer number to search for in the list
   * @return integer the index where the target is found (or null if not found)
   *
   * Examples:
   * binarySearchIterative([0, 5, 7, 10, 15], 0);
   * 0
   * binarySearchIterative([0, 5, 7, 10, 15], 15);
   * 4
   * binarySearchIterative([0, 5, 7, 10, 15], 5);
   * 1
   * binarySearchIterative([0, 5, 7, 10, 15], 6);
   *
   */
    $first = 0;
    $last = count($list)-1;


    while ($first <= $last) {
        $mid = ($first + $last) >> 1;


        if ($list[$mid] == $target) {
            return $mid;
        } elseif ($list[$mid] > $target) {
            $last = $mid - 1;
        } elseif ($list[$mid] < $target) {
            $first = $mid + 1;
        }
    }

    return null;
}

function binarySearchByRecursion($list, $target, $start, $end)
{
  /*
   * Binary search algorithm in PHP by recursion
   *
   * Be careful collection must be ascending sorted, otherwise result will be unpredictable
   *
   * @param Array $list a sorted array list of integers to search
   * @param integer $target an integer number to search for in the list
   * @param integer $start an integer number where to start searching in the list
   * @param integer $end an integer number where to end searching in the list
   * @return integer the index where the target is found (or null if not found)
   *
   * Examples:
   * binarySearchByRecursion([0, 5, 7, 10, 15], 0, 0, 4);
   * 0
   * binarySearchByRecursion([0, 5, 7, 10, 15], 15, 0, 4);
   * 4
   * binarySearchByRecursion([0, 5, 7, 10, 15], 5, 0, 4);
   * 1
   * binarySearchByRecursion([0, 5, 7, 10, 15], 6, 0, 4);
   *
   */
    if ($start > $end)
        return null;


    $mid = ($start + $end) >> 1;


    if ($list[$mid] == $target) {
        return $mid;
    } elseif ($list[$mid] > $target) {
        return binarySearchByRecursion($list, $target, $start, $mid-1);
    } elseif ($list[$mid] < $target) {
        return binarySearchByRecursion($list, $target, $mid+1, $end);
    }

    return null;
}


assert(binarySearchIterative([0, 5, 7, 10, 15], 0) == 0);
assert(binarySearchIterative([0, 5, 7, 10, 15], 7) == 2);
assert(binarySearchIterative([0, 5, 7, 10, 15], 8) == null);

assert(binarySearchByRecursion([0, 5, 7, 10, 15], 0, 0, 4) == 0);
assert(binarySearchByRecursion([0, 5, 7, 10, 15], 15, 0, 4) == 4);
assert(binarySearchByRecursion([0, 5, 7, 10, 15], 7, 0, 4) == 2);
assert(binarySearchByRecursion([0, 5, 7, 10, 15], 6, 0, 4) == null);
