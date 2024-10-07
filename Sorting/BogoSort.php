<?php

class BogoSort {
    // The array to be sorted
    private array $array;

    // Constructor to initialize the array
    public function __construct(array $array) {
        $this->array = $array;
    }

    // Method to check if the array is sorted
    private function isSorted(): bool {
        $count = count($this->array);
        for ($i = 0; $i < $count - 1; $i++) {
            if ($this->array[$i] > $this->array[$i + 1]) {
                return false;
            }
        }
        return true;
    }

    // Method to shuffle the array
    private function shuffleArray(): void {
        shuffle($this->array); // Built-in PHP shuffle function
    }

    // Method to sort the array using Bogo Sort
    public function sort(): array {
        while (!$this->isSorted()) {
            $this->shuffleArray();
        }
        return $this->array;
    }

    // Method to get the sorted array
    public function getSortedArray(): array {
        return $this->sort();
    }
}

// Example usage:
$array = [3, 1, 4, 1, 5];
$bogoSort = new BogoSort($array);

$sortedArray = $bogoSort->getSortedArray();
print_r($sortedArray);
