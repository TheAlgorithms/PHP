<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../ProjectEuler/Problem5.php';
require_once __DIR__.'/../ProjectEuler/Problem7.php';
require_once __DIR__.'/../ProjectEuler/Problem9.php';

class ProjectEulerTest extends TestCase
{
    public function testProblem5(): void
    {
        $this->assertSame(232792560, problem5());
    }

    public function testProblem7(): void
    {
        $this->assertSame(104743, problem7());
    }

    public function testProblem9(): void
    {
        $this->assertSame(31875000, problem9());
    }

}
