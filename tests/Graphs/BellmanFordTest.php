<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Graphs/BellmanFord.php';

use PHPUnit\Framework\TestCase;

class BellmanFordTest extends TestCase
{
    public function testBellmanFord()
    {
        $edgesRaw = [
            ['S', 8, 'E'],
            ['E', 1, 'D'],
            ['D', -1, 'C'],
            ['S', 10, 'A'],
            ['D', -4, 'A'],
            ['A', 2, 'C'],
            ['C', -2, 'B'],
            ['B', 1, 'A'],
        ];
        $vertices = [ 'S', 'A', 'B', 'C', 'D', 'E',];

        #prepare array of edges listed by edge start to simplify Bellman-Ford updating weights of other edges
        $edges = [];
        foreach($edgesRaw as $edgeRaw) {
            $edge = new Edge();
            $edge->start = $edgeRaw[0];
            $edge->end = $edgeRaw[2];
            $edge->weight = $edgeRaw[1];
            if (! isset($edges[$edgeRaw[0]])) {
                $edges[$edgeRaw[0]] = [];
            }
            $edges[$edgeRaw[0]][] = $edge;
        }

        $result = bellmanFord($vertices, $edges, 'S');

        $this->assertEquals($result, [
            'S' => 0,
            'A' => 5,
            'B' => 5,
            'C' => 7,
            'D' => 9,
            'E'=> 8
        ]);
    }
}
