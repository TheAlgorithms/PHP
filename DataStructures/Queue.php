<?php

/**
 * Queue Data Structure - FIFO (First In, First Out)
 */
class Queue
{
    private array $elements;
    private int $count;
    private int $lowestCount;

    public function __construct()
    {
        $this->elements = [];
        $this->count = 0;
        $this->lowestCount = 0;
    }

    public function enqueue($element): void
    {
        $this->elements[$this->count] = $element;
        $this->count++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $element = $this->elements[$this->lowestCount];

        unset($this->elements[$this->lowestCount]);

        $this->lowestCount++;

        return $element;
    }

    public function isEmpty(): bool
    {
        return $this->count - $this->lowestCount === 0;
    }

    public function size(): int
    {
        return $this->count - $this->lowestCount;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->elements[$this->lowestCount];
    }

    public function clear(): void
    {
        $this->elements = [];
        $this->count = 0;
        $this->lowestCount = 0;
    }

    public function toString(string $delimiter = ''): string
    {
        if ($this->isEmpty()) {
            return '';
        }

        $result = "{$this->elements[$this->lowestCount]}";

        for ($i = $this->lowestCount + 1; $i < $this->count; $i++) {
            $result .= "{$delimiter}{$this->elements[$i]}";
        }

        return $result;
    }
}
