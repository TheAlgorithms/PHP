<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/SinglyLinkedList.php';

/**
 * Tests for the Singly Linked Lists class
 */
class SinglyLinkedListTest extends TestCase
{
    /**
     * Create a SinglyLinkedList node
     */
    private function createNode(string $string): SinglyLinkedList
    {
        $node = new SinglyLinkedList($string[0]);

        for ($i = 1; $i < strlen($string); $i++) {
            $node->append($string[$i]);
        }

        return $node;
    }

    /**
     * Provider of SinglyLinkedList nodes
     */
    public function provideNodes()
    {
        return [
            'IsPalindrome' => [
                'node' => $this->createNode('hannah'),
                'expected' => true
            ],
            'IsPalindrome2' => [
                'node' => $this->createNode('hanah'),
                'expected' => true
            ],
            'IsNotPalindrome' => [
                'node' => $this->createNode('hanbah'),
                'expected' => false
            ],
            'IsNotPalindrome2' => [
                'node' => $this->createNode('han1h'),
                'expected' => false
            ],
        ];
    }

    /**
     * Test the if a SinglyLinkedList is a palindrome
     *
     * @dataProvider provideNodes
     */
    public function testIsPalindrome($node, $expected): void
    {
        $this->assertEquals($expected, $this->isPalindrome($node));
    }

    /**
     * Supporting method for testing if a linked list is palindrome
     */
    private function isPalindrome(SinglyLinkedList $node): bool
    {
        $length = $this->length($node);
        $pairs = 0;
        $curr = $node;

        while ($curr instanceof SinglyLinkedList) {
            if ($this->hasPair($curr->next, $curr->data)) {
                $pairs++;
            }

            $curr = $curr->next;
        }

        return $pairs == floor($length / 2);
    }

    /**
     * Supporting method for testing if a linked list is palindrome
     */
    private function hasPair($node, string $data): bool
    {
        if (! $node instanceof SinglyLinkedList) {
            return false;
        }

        $curr = $node;

        while ($curr instanceof SinglyLinkedList) {
            if ($curr->data == $data) {
                return true;
            }

            $curr = $curr->next;
        }

        return false;
    }

    /**
     * Supporting method for testing if a linked list is palindrome
     */
    private function length(SinglyLinkedList $node): int
    {
        $curr = $node;
        $counter = 0;

        while ($curr instanceof SinglyLinkedList) {
            $counter++;
            $curr = $curr->next;
        }

        return $counter;
    }

    /**
     * Test SinglyLinkedList's delete functionality
     */
    public function testDelete(): void
    {
        $this->assertEquals(
            $this->createNode('hanah'), // expected node
            $this->createNode('hannah')->delete('n'), // actual node
        );

        $this->assertNotEquals(
            $this->createNode('hanah'), // expected node
            $this->createNode('hannah')->delete('h'), // actual node
        );
    }
}
