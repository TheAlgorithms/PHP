<?php
/**
 * This function converts the
 * submitted Octal Number to
 * Decimal Number.
 *
 * Working of Algorithm
 * (AB) base 16
 * (A * (16 ^ 1) + B * (16 ^ 0)) base 10
 * (10 * (16 ^ 1) + 11 * (16 ^ 0)) base 10
 * (160 + 11) base 10
 * 171 base 10
 * @param string $octalNumber
 * @return int
 */
function hexToDecimal($hexNumber)
{
    // Using ctype to check all the digits are valid hex digits or not.
    if (!ctype_xdigit($hexNumber)) {
        throw new \Exception('Please pass a valid Hexadecimal Number for Converting it to a Decimal Number.');
    }

    $decimalNumber = 0;

    // Mapping for Decimal Digits after 9
    $decimalDigitMappings = [
        'A' => 10,
        'B' => 11,
        'C' => 12,
        'D' => 13,
        'E' => 14,
        'F' => 15,
    ];

    $hexDigits = str_split($hexNumber);
    $hexDigits = array_reverse($hexDigits);

    foreach ($hexDigits as $power => $digit) {
        $hexDigit = $digit;
        if (!is_numeric($digit)) {
            $hexDigit = $decimalDigitMappings[$digit];
        }
        $decimalNumber += (pow(16, $power) * $hexDigit);
    }
    return $decimalNumber;
}

/**
 * This function converts the
 * submitted Decimal Number to
 * Hexadecimal Number.
 *
 * @param string $decimalNumber
 * @return string
 */
function decimalToHex($decimalNumber)
{
    $hexDigits = [];

    // Mapping for HexaDecimal Digits after 9
    $hexDigitMappings = [
        10 => 'A',
        11 => 'B',
        12 => 'C',
        13 => 'D',
        14 => 'E',
        15 => 'F',
    ];
    if (!is_numeric($decimalNumber)) {
        throw new \Exception('Please pass a valid Decimal Number for Converting it to a Hexadecimal Number.');
    }

    while ($decimalNumber > 0) {
        $remainder = ($decimalNumber % 16);
        $decimalNumber /= 16;
        if (empty($hexDigits) && 0 === $remainder) {
            continue;
        }
        $hexDigits[] = $remainder;
    }

    $hexDigits = array_reverse($hexDigits);

    foreach ($hexDigits as $index => $digit) {
        if ($digit > 9) {
            $hexDigits[$index] = $hexDigitMappings[$digit];
        }
    }

    $hexNumber = ltrim(implode('', $hexDigits), '0'); // Connecting all the digits and removing leading zeroes.

    return $hexNumber;
}
