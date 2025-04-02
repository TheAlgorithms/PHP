<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/Stack.php';

class StackTest extends TestCase
{
    public function testConstruct(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testDestruct(): void
    {
        $stack = new Stack([1, 2, 3]);
        unset($stack);
        $this->expectNotToPerformAssertions();
    }

    public function testPush(): void
    {
        $stack = new Stack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testPop(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->pop());
        $this->assertEquals([1, 2], $stack->toArray());
    }

    public function testPeek(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->peek());
    }

    public function testIsEmpty(): void
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
    }

    public function testPrint(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectOutputString("1, 2, 3");
        $stack->print();
    }

    public function testToString(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectOutputString("1, 2, 3");
        echo $stack;
    }

    public function testLength(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->length());
    }

    public function testClear(): void
    {
        $stack = new Stack([1, 2, 3]);
        $stack->clear();
        $this->assertEquals([], $stack->toArray());
    }

    public function testSearch(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(2, $stack->search(3));
    }

    public function testToArray(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testFromArray(): void
    {
        $stack = new Stack();
        $stack->fromArray([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testReverse(): void
    {
        $stack = new Stack([1, 2, 3]);
        $stack->reverse();
        $this->assertEquals([3, 2, 1], $stack->toArray());
    }

    public function testSort(): void
    {
        $stack = new Stack([3, 2, 1]);
        $stack->sort();
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }
}
