<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/DoublyLinkedList.php';

/**
 * Tests for the Doubly Linked Lists class
 */

class DoublyLinkedListTest extends TestCase
{
    /**
     * Constructor test
     */
    public function testConstructor(): void
    {
        $list = new DoublyLinkedList();
        $this->assertEquals(0, $list->length());
    }

    /**
     * Test for the append method
     */
    public function testAppend(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->assertEquals(3, $list->length());
    }

    /**
     * Test for the insert method
     */
    public function testInsert(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->insert(1, 4);
        $this->assertEquals(4, $list->length());
    }

    /**
     * Test for the delete method
     */
    public function testDelete(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->delete(1);
        $this->assertEquals(2, $list->length());
    }

    /**
     * Test for the deleteAt method
     */
    public function testDeleteAt(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->deleteAt(1);
        $this->assertEquals(2, $list->length());
    }

    /**
     * Test for printList method
     */
    public function testPrintList(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->expectOutputString("1\n2\n3\n");
        $list->printList();
    }

    /**
     * Test for the printListReverse method
     */
    public function testPrintListReverse(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->expectOutputString("3\n2\n1\n");
        $list->printListReverse();
    }

    /**
     * Test for the reverse method
     */
    public function testReverse(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->reverse();
        $this->expectOutputString("3\n2\n1\n");
        $list->printList();
    }

    /**
     * Test for the length method
     */
    public function testLength(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->assertEquals(3, $list->length());
    }
    /**
     * Test for the Search method
     */
    public function testSearch(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $searchItem = $list->search(2);
        $this->assertEquals(2, $searchItem->data);
    }

    /**
     * Test for the isEmpty method
     */
    public function testIsEmpty(): void
    {
        $list = new DoublyLinkedList();
        $this->assertTrue(); // TODO: needs implementing
    }

    /**
     * Test for __toString method
     */
    public function testToString(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->expectOutputString("1, 2, 3");
        echo $list;
    }

    /**
     * Test for the toArray method
     */
    public function testToArray(): void
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->assertEquals([1,2,3], $list->toArray());
    }
}
