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
 * @param string $binaryNumber
 * @return int
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

/**
 * This function converts the
 * submitted Decimal Number to
 * Binary Number.
 *
 * @param string $decimalNumber
 * @return string
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
