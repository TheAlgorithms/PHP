<?php

class Edge
{
    public $start;
    public $end;
    public int $weight;
}

/**
 * The Bellman–Ford algorithm is an algorithm that computes shortest paths from a single source vertex to all of the
 * other vertices in a weighted digraph.
 * (https://en.wikipedia.org/wiki/Bellman%E2%80%93Ford_algorithm).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 * @param array $verticesNames An array of verticies names
 * @param Edge[] $edges An array of edges
 * @param string $start The starting vertex
 * @return array An array of shortest paths from $start to all other vertices
 */
function bellmanFord(array $verticesNames, array $edges, string $start, bool $verbose = false)
{
    $vertices = array_combine($verticesNames, array_fill(0, count($verticesNames), PHP_INT_MAX));

    $change = true;
    $round = 1;
    while ($change) {
        if ($verbose) {
            echo "round $round\n";
        }
        $change = false;
        foreach ($vertices as $vertice => $minWeight) {
            if ($verbose) {
                echo "checking vertice $vertice\n";
            }
            if ($start === $vertice) {
                $vertices[$vertice] = 0;
            }

            foreach ($edges[$vertice] as $edge) {
                if ($vertices[$edge->end] > $vertices[$vertice] + $edge->weight) {
                    if ($verbose) {
                        echo "replace $vertice " . $vertices[$edge->end] . " with " . $vertices[$vertice] + $edge->weight . "\n ";
                    }
                    $vertices[$edge->end] = $vertices[$vertice] + $edge->weight;
                    $change = true;
                }
            }
        }
        $round++;
    }
    return $vertices;
}
