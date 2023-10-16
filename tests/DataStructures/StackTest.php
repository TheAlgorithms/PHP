<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/Stack.php';

class StackTest extends TestCase
{
    public function testConstruct()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testDestruct()
    {
        $stack = new Stack([1, 2, 3]);
        unset($stack);
        $this->expectNotToPerformAssertions();
    }

    public function testPush()
    {
        $stack = new Stack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testPop()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->pop());
        $this->assertEquals([1, 2], $stack->toArray());
    }

    public function testPeek()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->peek());
    }

    public function testIsEmpty()
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
    }

    public function testPrint()
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectOutputString("1, 2, 3");
        $stack->print();
    }

    public function testToString()
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectOutputString("1, 2, 3");
        echo $stack;
    }

    public function testLength()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->length());
    }

    public function testClear()
    {
        $stack = new Stack([1, 2, 3]);
        $stack->clear();
        $this->assertEquals([], $stack->toArray());
    }

    public function testSearch()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(2, $stack->search(3));
    }

    public function testToArray()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testFromArray()
    {
        $stack = new Stack();
        $stack->fromArray([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    public function testReverse()
    {
        $stack = new Stack([1, 2, 3]);
        $stack->reverse();
        $this->assertEquals([3, 2, 1], $stack->toArray());
    }

    public function testSort()
    {
        $stack = new Stack([3, 2, 1]);
        $stack->sort();
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }
}
