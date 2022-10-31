<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Graphs/DepthFirstSearch.php';

use PHPUnit\Framework\TestCase;

class DepthFirstSearchTest extends TestCase
{
    public function testDepthFirstSearch()
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
        $visited = dfs($graph, "A");
        $this->assertEquals(["A", "B", "D", "E", "F", "C", "G"], $visited);
    }
    public function testDepthFirstSearch2()
    {
        $graph = array(
            [1, 2],
            [2],
            [0, 3],
            [3],
        );

        $visited = dfs($graph, 2);
        $this->assertEquals([2, 0, 1, 3], $visited);
    }
    public function testDepthFirstSearch3()
    {
        $graph = array(
            [2, 3, 1],
            [0],
            [0, 4],
            [0],
            [2],
        );
        $visited = dfs($graph, 0);
        $this->assertEquals([0, 2, 4, 3, 1], $visited);
    }
}
