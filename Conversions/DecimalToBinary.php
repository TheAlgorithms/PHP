<?php

/**
 * This function converts the
 * submitted Decimal Number to
 * Binary Number.
 *
 * @param  string  $decimalNumber
 * @return string
 * @throws \Exception
 */
function decimalToBinary($decimalNumber)
{
    if (!is_numeric($decimalNumber)) {
        throw new \Exception('Please pass a valid Decimal Number for Converting it to a Binary Number.');
    }

    $binaryNumber = '';

    while ($decimalNumber > 0) {
        $binaryNumber = ($decimalNumber % 2) . $binaryNumber;
        $decimalNumber /= 2;
    }

    return $binaryNumber;
}
