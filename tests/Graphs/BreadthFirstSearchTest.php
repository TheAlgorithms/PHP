<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Graphs/BreadthFirstSearch.php';

use PHPUnit\Framework\TestCase;

class DepthFirstSearchTest extends TestCase
{
    public function testBreadthFirstSearch()
    {
        $graph = array(
            "A" => ["B", "C", "D"],
            "B" => ["A", "D", "E"],
            "C" => ["A", "F"],
            "D" => ["B", "D"],
            "E" => ["B", "F"],
            "F" => ["C", "E", "G"],
            "G" => ["F"],
        );
        $ans = bfs($graph, "A", "F");
        $this->assertTrue($ans);
    }
    public function testBreadthFirstSearch2()
    {
        $graph = array(
            [1, 2],
            [2],
            [0, 3],
            [3],
        );

        $ans2 = bfs($graph, 3, 0);
        $this->assertFalse($ans2);
    }
    public function testBreadthFirstSearch3()
    {
        $graph = array(
            [2, 3, 1],
            [0],
            [0, 4],
            [0],
            [2],
        );
        $ans = bfs($graph, 0, 3);
        $this->assertTrue($ans);
    }
}

