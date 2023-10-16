<?php

/**
 * Stack Implementation in PHP
 */
class Stack
{
    private array $stack = [];

    public function __construct(array $array = [])
    {
        $this->stack = $array;
    }

    public function __destruct()
    {
        unset($this->stack);
    }


    public function push($data): void
    {
        array_push($this->stack, $data);
    }

    public function pop()
    {
        return array_pop($this->stack);
    }

    public function peek()
    {
        return $this->stack[count($this->stack) - 1];
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function print(): void
    {
        echo implode(', ', $this->stack);
    }

    public function __toString(): string
    {
        return implode(', ', $this->stack);
    }

    public function length(): int
    {
        return count($this->stack);
    }

    public function clear(): void
    {
        $this->stack = [];
    }

    public function search($data): int
    {
        return array_search($data, $this->stack);
    }

    public function toArray(): array
    {
        return $this->stack;
    }

    public function fromArray(array $array): void
    {
        $this->stack = $array;
    }

    public function reverse(): void
    {
        $this->stack = array_reverse($this->stack);
    }

    public function sort(): void
    {
        sort($this->stack);
    }
}
