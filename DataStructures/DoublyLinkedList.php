<?php

require_once __DIR__ . '/Node.php';

/**
 *  Doubly Linked List
 */
class DoublyLinkedList
{
    public ?Node $head = null;
    public ?Node $tail = null;

    // Constructor
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    // Destructor
    public function __destruct()
    {
        $this->head = null;
        $this->tail = null;
    }

    // Append to the end of the list
    public function append($data): void
    {
        $newNode = new Node($data);

        // If the list is empty, set the head and tail to the new node
        if ($this->head === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }

        // Otherwise, set the tail's next node to the new node
        $this->tail->next = $newNode;

        // Set the new node's previous node to the tail
        $newNode->prev = $this->tail;

        // Set the tail to the new node
        $this->tail = $newNode;
    }

    // Insert a node after a given position
    public function insert($data, $position): void
    {
        $newNode = new Node($data);

        // If the list is empty, set the head and tail to the new node
        if ($this->head === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }

        // If the position is 0, set the new node's next node to the head
        // Set the head's previous node to the new node
        // Set the head to the new node
        if ($position === 0) {
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
            return;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Loop through the list until we reach the position
        for ($i = 0; $i < $position; $i++) {
            // If the current node is null, we've reached the end of the list
            // Set the tail's next node to the new node
            // Set the new node's previous node to the tail
            // Set the tail to the new node
            if ($current === null) {
                $this->tail->next = $newNode;
                $newNode->prev = $this->tail;
                $this->tail = $newNode;
                return;
            }

            // Otherwise, set the current node to the next node
            $current = $current->next;
        }

        // Set the new node's next node to the current node
        // Set the new node's previous node to the current node's previous node
        // Set the current node's previous node's next node to the new node
        // Set the current node's previous node to the new node
        $newNode->next = $current;
        $newNode->prev = $current->prev;
        $current->prev->next = $newNode;
        $current->prev = $newNode;
    }

    // Delete a node from the list
    public function delete($data): void
    {
        // If the list is empty, return
        if ($this->head === null) {
            return;
        }

        // If the head's data is the data we're looking for
        // Set the head to the head's next node
        // Set the head's previous node to null
        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            $this->head->prev = null;
            return;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // If the current node's data is the data we're looking for
            // Set the current node's previous node's next node to the current node's next node
            // Set the current node's next node's previous node to the current node's previous node
            if ($current->data === $data) {
                $current->prev->next = $current->next;
                $current->next->prev = $current->prev;
                return;
            }

            // Otherwise, set the current node to the next node
            $current = $current->next;
        }
    }

    // Delete a node from a given position
    public function deleteAt($position): void
    {
        // If the list is empty, return
        if ($this->head === null) {
            return;
        }

        // If the position is 0
        // Set the head to the head's next node
        // Set the head's previous node to null
        if ($position === 0) {
            $this->head = $this->head->next;
            $this->head->prev = null;
            return;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Loop through the list until we reach the position
        for ($i = 0; $i < $position; $i++) {
            // If the current node is null, we've reached the end of the list
            // Set the tail to the current node's previous node
            // Set the tail's next node to null
            if ($current === null) {
                $this->tail = $current->prev;
                $this->tail->next = null;
                return;
            }

            // Otherwise, set the current node to the next node
            $current = $current->next;
        }

        // Set the current node's previous node's next node to the current node's next node
        // Set the current node's next node's previous node to the current node's previous node
        $current->prev->next = $current->next;
        $current->next->prev = $current->prev;
    }

    // Print the list
    public function printList(): void
    {
        // If the list is empty, return
        if ($this->head === null) {
            return;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // Print the current node's data
            echo $current->data . "\n";

            // Set the current node to the next node
            $current = $current->next;
        }
    }

    // Print the list in reverse
    public function printListReverse(): void
    {
        // If the list is empty, return
        if ($this->head === null) {
            return;
        }

        // Otherwise, set the current node to the tail
        $current = $this->tail;

        // Loop through the list until we reach the beginning of the list
        while ($current !== null) {
            // Print the current node's data
            echo $current->data . "\n";

            // Set the current node to the previous node
            $current = $current->prev;
        }
    }

    // Reverse the list
    public function reverse(): void
    {
        // If the list is empty, return
        if ($this->head === null) {
            return;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // Set the temp node to the current node's next node
            $temp = $current->next;

            // Set the current node's next node to the current node's previous node
            $current->next = $current->prev;

            // Set the current node's previous node to the temp node
            $current->prev = $temp;

            // Set the current node to the temp node
            $current = $temp;
        }

        // Set the temp node to the head
        $temp = $this->head;

        // Set the head to the tail
        $this->head = $this->tail;

        // Set the tail to the temp node
        $this->tail = $temp;
    }

    // Get the length of the list
    public function length(): int
    {
        // If the list is empty, return 0
        if ($this->head === null) {
            return 0;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Set the length to 0
        $length = 0;

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // Increment the length
            $length++;

            // Set the current node to the next node
            $current = $current->next;
        }

        // Return the length
        return $length;
    }

    // Search for a node
    public function search($data): ?Node
    {
        // If the list is empty, return null
        if ($this->head === null) {
            return null;
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // If the current node's data is the data we're looking for, return the current node
            if ($current->data === $data) {
                return $current;
            }

            // Set the current node to the next node
            $current = $current->next;
        }

        // Return null
        return null;
    }

    // Is the list empty?
    public function isEmpty(): bool
    {
        // If the head is null, return true
        if ($this->head === null) {
            return true;
        }

        // Otherwise, return false
        return false;
    }

    // To String
    public function __toString(): string
    {
        // If the list is empty, return an empty string
        if ($this->head === null) {
            return '';
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Set the string to an empty string
        $string = '';

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // Append the current node's data to the string
            $string .= $current->data;

            // If the current node's next node is not null, append a comma and a space to the string
            if ($current->next !== null) {
                $string .= ', ';
            }

            // Set the current node to the next node
            $current = $current->next;
        }

        // Return the string
        return $string;
    }

    // To Array
    public function toArray(): array
    {
        // If the list is empty, return an empty array
        if ($this->head === null) {
            return [];
        }

        // Otherwise, set the current node to the head
        $current = $this->head;

        // Set the array to an empty array
        $array = [];

        // Loop through the list until we reach the end of the list
        while ($current !== null) {
            // Append the current node's data to the array
            $array[] = $current->data;

            // Set the current node to the next node
            $current = $current->next;
        }

        // Return the array
        return $array;
    }
}
