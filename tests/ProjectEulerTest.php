<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../ProjectEuler/Problem7.php';

class ProjectEulerTest extends TestCase
{
    public function testProblem7(): void
    {
        $this->assertSame(104743, problem7());
    }

}
