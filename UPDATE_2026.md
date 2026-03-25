# PHP-the-Algorithms: 2026 Modernization Update

## Overview
This document outlines the massive architectural modernization and code-quality polish applied to the `TheAlgorithms/PHP` repository. The primary goal of this update was to elevate the entire codebase from a legacy PHP 7.1+ standard up to modern **PHP 8.2+** strictly typed equivalents, ensuring the repository remains an accurate, highly-performant educational standard.

## 1. Automated Global Refactoring (114 Files)
Instead of manual, piece-meal fixes, the repository was aggressively refactored computationally utilizing **Rector (`^1.0`)** and **PHP-CS-Fixer (`^3.40`)**. This automation touched virtually every file in the following directories: `Ciphers`, `Conversions`, `DataStructures`, `Graphs`, `Maths`, `NeuralNetworks`, `Searches`, `Sorting`, `Strings`, and `Utils`.

*   **`declare(strict_types=1);` Enforcement:** Every single algorithm file was prepended with strict types. This offloads input validation directly to the PHP 8 Zend Engine (`TypeError`), drastically improving algorithmic speed and safety.
*   **Type Declarations:** Rector algorithms scanned all methods and automatically inferred and injected missing strict parameter hints and return types constraints across the entire repo via `SetList::TYPE_DECLARATION`.
*   **Dead Code Elimination:** Unreachable logic was permanently excised, and deeply nested conditionals within the algorithms were flattened for supreme readability (`SetList::DEAD_CODE`, `SetList::EARLY_RETURN`).
*   **Formatting:** The entire codebase was hard-formatted to strictly align with PSR-12 coding standards.

## 2. Detailed Manual File Changes
While automation handled the bulk of the syntax, applying `strict_types=1` uncovered several dormant floating-point precision bugs masquerading as integers. The following files received precise, manual logic interventions:

### Infrastructure & CI/CD
*   **`composer.json` (Lines 13-20):** Bumped PHP requirement to `^8.2 || ^8.3 || ^8.4 || ^8.5`. Installed `phpstan/phpstan`, `rector/rector`, and `friendsofphp/php-cs-fixer`. Added `"phpstan"` script.
*   **`.github/workflows/ci.yml` (Lines 10-20):** Upgraded `setup-php` from a static `7.4` test to a modern concurrent testing matrix scaling `['8.2', '8.3', '8.4', '8.5']`.
*   **`.github/workflows/code-style.yml` (Lines 16-20):** Upgraded `php-version` target to `8.2`.
*   **`CONTRIBUTING.md` (Lines 31-76):** Fixed Markdown linting violations (MD004, MD032). Updated contributing instructions to require PHP 8.2+, PSR-12 formatting, and PHPStan validation.

### Conversions Module
*   **`Conversions/HexadecimalToDecimal.php` (Lines 76-87):** Replaced loose floating-point division (`/`) with explicit integer division (`intdiv()`) and type-casted output to prevent infinite loops on massive numeric bounds.
*   **`Conversions/OctalToDecimal.php` (Lines 26, 48-55):** Replaced legacy modulo looping mechanics with strict `intdiv()`.
*   **`Conversions/BinaryToDecimal.php` (Line 25):** Safely cast input to `(string)` to satisfy `str_split()` strict type requirements.

### Maths Module
*   **`Maths/ArmstrongNumber.php` (Line 13):** Cast numeric integer input to `(string)` to satisfy `str_split()` strict parameters.
*   **`Maths/CheckPalindrome.php` (Line 13):** Cast numeric variable to `(string)` prior to array mapping.
*   **`Maths/NeonNumber.php` (Line 8):** Prevented `TypeError` by explicitly casting the squared result to `(string)` before splitting.

### Sorting & Ciphers Modules
*   **`Sorting/MergeSort.php` (Line 17):** Swapped `floor(count() / 2)` (which returns a float) for `intdiv(count(), 2)` to ensure `array_slice` receives a strict integer length.
*   **`Sorting/HeapSort.php` (Line 27):** Cast `floor($n / 2) - 1` to `(int)` to ensure `heapify()` root logic receives integers.
*   **`Ciphers/RailfenceCipher.php` (Line 51):** Replaced `floor($textLength / $position)` with `intdiv()` to fix floating point substring exceptions.
*   **`Ciphers/MonoAlphabeticCipher.php` (Line 8):** Changed method signature from `array $key` to `string $key` to accurately reflect internal `strlen()` assertions.

### QA & Tests
*   **`tests/DataStructures/SinglyLinkedListTest.php` (Lines 31-60):** Refactored `provideNodes` to a `public static function` returning string primitives instead of instantiated objects (`$this->createNode`) to satisfy PHPUnit 10+ data provider architecture rules.
*   **`tests/Conversions/ConversionsTest.php` (Lines 17-143):** Updated assertion expected types to `\Throwable::class` to accurately trap the new engine-level `TypeError` exceptions natively thrown by PHP 8.2 strict engines instead of generic `Exception`.

---
*Authored to catalog the PHP ~8.2 framework transition.*
