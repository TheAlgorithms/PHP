<?php

/**
 * Linked List Node Class
 */
class Node
{
    public ?Node $next = null;
    public ?Node $prev = null;
    public $data;

    // Constructor
    public function __construct($data)
    {
        $this->data = $data;
    }
}
