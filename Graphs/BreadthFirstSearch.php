<?php

/**
 * Breadth-first search (BFS) is an algorithm for searching a tree data structure for a node that satisfies a given property.
 * (https://en.wikipedia.org/wiki/Breadth-first_search).
 * 
 * This is a non recursive implementation.
 * 
 * References:
 * https://cp-algorithms.com/graph/breadth-first-search.html
 * 
 * https://the-algorithms.com/algorithm/depth-first-search?lang=python
 * 
 * @author Aryansh Bhargavan https://github.com/aryanshb
 * @param array $adjList An array representing the grapth as an Adjacent List
 * @param int|string $start The starting vertex
 * @return bool if path between start and end vertex exists
 */

function bfs($adjList, $start, $end) {
    $visited = [];
    $queue = [$start];
    while (!empty($queue)) {
        $v = array_shift($queue);
        $visited[$v] = 1;
        foreach ($adjList[$v] as $adj) {
            if (!array_key_exists($adj, $visited)) {
                array_push($queue, $adj);
            }
        }
    }
    return array_key_exists($end, $visited);
}

// An example:
$adjList = [
    'A' => [],
    'B' => ['A', 'D', 'E'],
    'C' => ['A', 'F'],
    'D' => ['B'],
    'E' => ['B', 'F'],
    'F' => ['C', 'E']
];
echo bfs($adjList, 'A', 'B') ? 'true' : 'false';
echo bfs($adjList, 'B', 'F') ? 'true' : 'false';


