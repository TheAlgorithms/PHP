<?php

/**
 * This function converts the
 * submitted Octal Number to
 * Decimal Number.
 *
 * Working of Algorithm
 * (10) base 8
 * (1 * (8 ^ 1) + 0 * (8 ^ 0)) base 10
 * (8 + 0) base 10
 * 9 base 10
 * @param  string  $octalNumber
 * @return int
 * @throws \Exception
 */
function octalToDecimal($octalNumber)
{
    if (!is_numeric($octalNumber)) {
        throw new \Exception('Please pass a valid Octal Number for Converting it to a Decimal Number.');
    }

    $decimalNumber = 0;
    $octalDigits   = array_reverse(str_split($octalNumber));

    foreach ($octalDigits as $index => $digit) {
        $decimalNumber += $digit * pow(8, $index);
    }

    return $decimalNumber;
}

/**
 * This function converts the
 * submitted Decimal Number to
 * Octal Number.
 *
 * @param  string  $decimalNumber
 * @return string
 * @throws \Exception
 */
function decimalToOctal($decimalNumber)
{
    if (!is_numeric($decimalNumber)) {
        throw new \Exception('Please pass a valid Decimal Number for Converting it to an Octal Number.');
    }

    $octalNumber = '';

    while ($decimalNumber > 0) {
        $octalNumber = ($decimalNumber % 8) . $octalNumber;
        $decimalNumber /= 8;
    }

    return $octalNumber;
}
