<?php

/**
 * Find distance (Levenshtein distance)
 *
 * Compute the difference between two sequences, ie, the minimum number of changes
 * to get to $str2 from $str1
 *
 * @param string $str1
 * @param string $str2
 * @return int the minimum number of changes to transform one string into another
 */
function findDistance($str1, $str2)
{
    $lenStr1 = strlen($str1);
    $lenStr2 = strlen($str2);
    if ($lenStr1 == 0) {
        return $lenStr2;
    }

    if ($lenStr2 == 0) {
        return $lenStr1;
    }

    $distanceVectorInit = [];
    $distanceVectorFinal = [];

    for ($i = 0; $i < $lenStr1 + 1; $i++) {
        $distanceVectorInit[] = 0;
        $distanceVectorFinal[] = 0;
    }

    for ($i = 0; $i < $lenStr1 + 1; $i++) {
        $distanceVectorInit[$i] = $i;
    }

    for ($i = 0; $i < $lenStr2; $i++) {
        $distanceVectorFinal[0] = $i + 1;

        // use formula to fill in the rest of the row
        for ($j = 0; $j < $lenStr1; $j++) {
            $substitutionCost = 0;
            if ($str1[$j] == $str2[$i]) {
                $substitutionCost = $distanceVectorInit[$j];
            } else {
                $substitutionCost = $distanceVectorInit[$j] + 1;
            }

            $distanceVectorFinal[$j + 1] = min($distanceVectorInit[$j + 1] + 1, min($distanceVectorFinal[$j] + 1, $substitutionCost));
        }

        $distanceVectorInit = $distanceVectorFinal;
    }


    return $distanceVectorFinal[$lenStr1];
}
