<?php

/**
 * Reverse linked list
 * (https://en.wikipedia.org/wiki/Linked_list).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class ReverseLinkedList
{
    public function reverse(LinkedListItem $item): LinkedListItem
    {
        $next = $item->getNext();
        $item->setNext(null);
        while (true) {
            $item->setPrev($next);
            if (! $next) {
                return $item;
            }
            $nextNext = $next->getNext();
            $next->setNext($item);
            $item = $next;
            $next = $nextNext;
        }
    }
}
