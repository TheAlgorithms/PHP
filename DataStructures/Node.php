<?php

declare(strict_types=1);

/**
 * Linked List Node Class
 */
class Node
{
    public ?Node $next = null;

    public ?Node $prev = null;

    // Constructor
    public function __construct(public $data)
    {
    }
}
