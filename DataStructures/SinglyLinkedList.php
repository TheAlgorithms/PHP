<?php

/**
 *  Singly Linked List
 */
class SinglyLinkedList
{
    public ?SinglyLinkedList $next = null;
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function append($data): void
    {
        $current = $this;
        while ($current instanceof SinglyLinkedList && isset($current->next)) {
            $current = $current->next;
        }

        $current->next = new SinglyLinkedList($data);
    }

    public function delete($data): SinglyLinkedList
    {
        $current = $this;
        if ($current->data == $data) {
            return $current->next;
        }

        while ($current instanceof SinglyLinkedList && isset($current->next)) {
            if ($current->next->data === $data) {
                $current->next = $current->next->next;
                return $this;
            }

            $current = $current->next;
        }

        return $this;
    }
}
