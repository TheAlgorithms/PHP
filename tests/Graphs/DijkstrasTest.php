<?php

namespace Graphs;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Graphs/GraphEdge.php';
require_once __DIR__ . '/../../Graphs/Dijkstras.php';

use GraphEdge;
use PHPUnit\Framework\TestCase;

class DijkstrasTest extends TestCase
{
    public function testDijkstras()
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
        $vertices = ['S', 'A', 'B', 'C', 'D', 'E',];

        #prepare array of edges listed by edge start to simplify Dijkstra's updating weights of other edges
        $edges = [];
        foreach ($edgesRaw as $edgeRaw) {
            $edge = new GraphEdge();
            $edge->start = $edgeRaw[0];
            $edge->end = $edgeRaw[2];
            $edge->weight = $edgeRaw[1];
            $edges[] = $edge;
        }

        $result = dijkstras($vertices, $edges, 'S');

        $this->assertEquals(
            [
                'S' => 0,
                'A' => 5,
                'B' => 5,
                'C' => 7,
                'D' => 9,
                'E' => 8
            ],
            $result
        );
    }
}
