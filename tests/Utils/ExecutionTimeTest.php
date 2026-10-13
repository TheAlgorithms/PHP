<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Utils/ExecutionTime.php';

class ExecutionTimeTest extends TestCase
{
    public function testReportsElapsedTimeOnlyOnDestruct(): void
    {
        ob_start();
        try {
            $timer = new ExecutionTime();
            usleep(1000); // 1 ms of measured work

            // Nothing is printed while the timer is alive...
            $this->assertSame('', ob_get_contents());

            unset($timer); // ...the report is emitted by __destruct()

            $output = ob_get_contents();
        } finally {
            ob_end_clean();
        }

        $this->assertMatchesRegularExpression('/^Executed in [0-9.]+(?:E-?\d+)? seconds$/', $output);
    }

    public function testMeasuredIntervalExceedsSleepDuration(): void
    {
        $sleepMicroseconds = 20000; // 20 ms

        ob_start();
        try {
            $timer = new ExecutionTime();
            usleep($sleepMicroseconds);
            unset($timer);
            $output = ob_get_contents();
        } finally {
            ob_end_clean();
        }

        $this->assertSame(1, preg_match('/Executed in ([0-9.]+(?:E-?\d+)?) seconds/', $output, $matches));
        $this->assertGreaterThanOrEqual($sleepMicroseconds / 1_000_000, (float) $matches[1]);
    }
}
