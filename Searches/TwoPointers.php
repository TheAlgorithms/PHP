<?php

/**
 * Two Pointers Approach
 * 
 * This method is designed to improve the efficiency of algorithms by processing two elements per
 * loop instead of just one, thereby reducing both time and space complexity
 * 
 * This technique is particularly useful for problems that can be solved by comparing elements at opposite
 * ends of the array or list and adjusting the position of the pointers based on the comparison results.
 * 
 * The technique involves using two pointers, which can start from the beginning and the end of the array
 * or list, or one pointer moving at a slower pace while the other moves at a faster pace.
 */

/**
 * To understand the technique let's solve a simple problem,
 * Problem Statement:
 *     There is an array "$arr" and a target number "$target". We have to find how many pairs
 *     of elements of $arr sum up to $target.
 *     For example: $arr = [2,4,3,8,6,6,10], $target = 12
 *     in this array 2+10 = 12, 4+8 = 12, 6+6 = 12, therefore, there are 3 pairs which sum up to 12.
 *
 * If we solve this problem using two nested loops, the time complexity would be O(n^2),
        for($i=0; $i<sizeof($arr); ++$i){
            for($j=$i+1; $j<sizeof($arr); ++$j){
                if($arr[$i] + $arr[$j] == $target)
                    $ans++;
            }
        }
 * To reduce the time complexity to O(n), we need Two Pointers technique.
 */

// Two Pointers step by step solution to that problem is given below:
$arr = [2, 4, 3, 8, 6, 6, 10]; # given array
$target = 12; # given target

function TwoPointers($arr, $target)
{
    // First we need to sort the array so that we can take advantage of the order
    sort($arr); # $arr becomes [2,3,4,6,6,8,10]

    // Now we are having two pointers "$left" and "$right"
    // $left at the start and $right at the end of the array
    $n = sizeof($arr);
    $left = 0;
    $right = $n - 1;

    $ans = 0; # we will store the number of pairs in $ans

    // Now we will scan the array until $left and $right meet
    while ($left < $right) {
        # Now carefully understand how we move one of our pointers
        if ($arr[$left] + $arr[$right] < $target) {
            // it means the sum is less than $target and we need to increase our sum
            /* if we move $right pointer to the left the sum will decrease even more because
            the array is sorted */
            // to increase the sum we will move $left pointer to the right
            $left++; # moving to right
        } else if ($arr[$left] + $arr[$right] > $target) {
            // the sum is greater than the target, so we need to decrease the sum
            /* moving the $left pointer to right won't help because this will only increase
            the sum even more */
            // to decrease the sum we will move our $right pointer to the left
            $right--; # moving to left
        } else if ($arr[$left] + $arr[$right] == $target) {
            // if it's true, we have found a pair
            $ans++; # incrementing the $ans
            // now we will move one of our pointers, otherwise it'll run forever
            $left++; # doesn't matter which one we move
        }
        // The loop will go until the pointers point to the same element
        // This will perfectly calculate the number of pairs
    }
    return $ans; # returning the number of pairs
}
echo TwoPointers($arr, $target); # outputs 3 as we've seen it

