<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../../DataStructures/Queue.php";

class QueueTest extends TestCase
{
    /**
     * @test
     */
    public function shouldAddElementToQueue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(3, $queue->size());
        $this->assertEquals(1, $queue->peek());
    }

    /**
     * @test
     */
    public function shouldRemoveElementFromQueue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals(2, $queue->peek());
        $this->assertEquals(2, $queue->size());
    }

    /**
     * @test
     */
    public function shouldReturnCorrectValueWhenDequeue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals(2, $queue->dequeue());
        $this->assertEquals(3, $queue->dequeue());
    }

    /**
     * @test
     */
    public function shouldReturnNullWhenDequeueEmptyQueue(): void
    {
        $queue = new Queue();

        $this->assertNull($queue->dequeue());
    }

    /**
     * @test
     */
    public function shouldReturnTrueIfQueueIsEmpty(): void
    {
        $queue = new Queue();

        $this->assertTrue($queue->isEmpty());
    }

    /**
     * @test
     */
    public function shouldReturnFalseIfQueueIsNotEmpty(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);

        $this->assertFalse($queue->isEmpty());
    }

    /**
     * @test
     */
    public function shouldReturnQueueSize(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(3, $queue->size());
        $this->assertEquals(1, $queue->peek());
    }

    /**
     * @test
     */
    public function shouldReturnFrontElement(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(1, $queue->peek());
        $this->assertEquals(3, $queue->size());
    }

    /**
     * @test
     */
    public function shouldReturnNullWhenPeekEmptyQueue(): void
    {
        $queue = new Queue();

        $this->assertNull($queue->peek());
    }

    /**
     * @test
     */
    public function shouldClearQueue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $queue->clear();

        $this->assertTrue($queue->isEmpty());
        $this->assertEquals(0, $queue->size());
        $this->assertNull($queue->peek());
    }

    /**
     * @test
     */
    public function shouldReturnStringRepresentation(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertIsString($queue->toString());
        $this->assertEquals("1, 2, 3", $queue->toString(', '));
    }
}
