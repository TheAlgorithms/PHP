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
     * Provider of non-existing IPs
     */
    public function provideNodes()
    {
        $string = 'hannah';
        $nodeIs = new SinglyLinkedList($string[0]);

        for ($i = 1; $i < strlen($string); $i++) {
            $nodeIs->append($string[$i]);
        }

        $string = 'hanbah';
        $nodeIsNot = new SinglyLinkedList($string[0]);

        for ($i = 1; $i < strlen($string); $i++) {
            $nodeIsNot->append($string[$i]);
        }

        return [
            'IsPalindrome' => [
                'node' => $nodeIs,
                'expected' => true,
            ],
            'IsNotPalindrome' => [
                'node' => $nodeIsNot,
                'expected' => false,
            ],
        ];
    }

    /**
     * Test the if a singly linked list is a palindrome
     *
     * @dataProvider provideNodes
     */
    public function testIsPalindrome($node, $expected): void
    {
        $this->assertSame($expected, $this->isPalindrome($node));
    }

    /**
     * Supporting methods for testing if a linked list is palindrome
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
}
