<?php

/**
 * The Dijkstra's algorithm is an algorithm for finding the shortest paths between nodes in a weighted graph.
 * (https://en.wikipedia.org/wiki/Dijkstra%27s_algorithm).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 * @param array $verticesNames An array of vertices names
 * @param GraphEdge[] $edges An array of edges
 * @param string $start The starting vertex
 * @return array An array of shortest paths from $start to all other vertices
 */
function dijkstras(array $verticesNames, array $edges, string $start): array
{
    $vertices = array_combine($verticesNames, array_fill(0, count($verticesNames), PHP_INT_MAX));
    $visitedNodes = [];

    $nextVertex = $start;
    $vertices[$start] = 0;
    while (count($visitedNodes) < count($verticesNames)) { //continue until all nodes are visited
        foreach ($edges as $edge) {
            if ($edge->start == $nextVertex) { //consider only nodes connected to current one
                $vertices[$edge->end] = min($vertices[$edge->end], $vertices[$nextVertex] + $edge->weight);
            }
        }

        // find vertex with current lowest value to be starting point in next iteration
        $minVertexName = null;
        $minVertexWeight = PHP_INT_MAX;
        foreach ($vertices as $name => $weight) {
            if (in_array($name, $visitedNodes) || $name == $nextVertex) {
                continue;
            }
            if ($weight <= $minVertexWeight) {
                $minVertexName = $name;
                $minVertexWeight = $weight;
            }
        }
        $visitedNodes[] = $nextVertex;
        $nextVertex = $minVertexName;
    }
    return $vertices;
}
