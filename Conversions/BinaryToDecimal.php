<?php

/**
 * This function converts the
 * submitted Binary Number to
 * Decimal Number.
 *
 * Working of Algorithm
 * (10) base 2
 * (1 * (2 ^ 1) + 0 * (2 ^ 0)) base 10
 * (2 + 0) base 10
 * 2 base 10
 *
 * @param  string  $binaryNumber
 * @return int
 * @throws \Exception
 */
function binaryToDecimal($binaryNumber)
{
    if (!is_numeric($binaryNumber)) {
        throw new \Exception('Please pass a valid Binary Number for Converting it to a Decimal Number.');
    }

    $decimalNumber = 0;
    $binaryDigits  = array_reverse(str_split($binaryNumber));

    foreach ($binaryDigits as $index => $digit) {
        $decimalNumber += $digit * pow(2, $index);
    }

    return $decimalNumber;
}
