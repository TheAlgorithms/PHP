<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem1.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem2.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem3.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem4.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem5.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem6.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem7.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem8.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem9.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem10.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem11.php';

class ProjectEulerTest extends TestCase
{
    public function testProblem1(): void
    {
        $this->assertSame(233168, problem1a());
        $this->assertSame(233168, problem1b());
    }

    public function testProblem2(): void
    {
        $this->assertSame(4613732, problem2());
    }

    public function testProblem3(): void
    {
        $this->assertSame(6857, problem3());
    }

    public function testProblem4(): void
    {
        $this->assertSame(906609, problem4());
    }

    public function testProblem5(): void
    {
        $this->assertSame(232792560, problem5());
    }

    public function testProblem6(): void
    {
        $this->assertSame(25164150, problem6());
    }

    public function testProblem7(): void
    {
        $this->assertSame(104743, problem7());
    }

    public function testProblem8(): void
    {
        $this->assertSame(23514624000, problem8());
    }

    public function testProblem9(): void
    {
        $this->assertSame(31875000, problem9());
    }

    public function testProblem10(): void
    {
        $this->assertSame(142913828922, problem10());
    }

    public function testProblem11(): void
    {
        $this->assertSame(70600674, problem11());
    }
}
