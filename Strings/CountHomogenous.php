<?php

    /**
     *Count homogenous substrings 
     * @param String $s
     * @return Integer
     */
    function countHomogenous($s) {
        $mod = 1000000007;
        $finalcnt = 0;
        $len = 1;

        for ($i = 1; $i <= strlen($s); $i++) {
            if ($i < strlen($s) && $s[$i] == $s[$i - 1]) {
                $len++;
            } else {
                $finalcnt = ($finalcnt + ($len * ($len+ 1) / 2)) % $mod;  //calculating the sum of first n(len) natural no. and finally adding it to our final answer.
                $len = 1;  //Now count newsubstring
            }
        }

    return $finalcnt;
    }
