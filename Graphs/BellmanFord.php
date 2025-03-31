<?php

/**
 * The Bellman–Ford algorithm is an algorithm that computes shortest paths from a single source vertex to all the
 * other vertices in a weighted digraph.
 * (https://en.wikipedia.org/wiki/Bellman%E2%80%93Ford_algorithm).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 * @param array $verticesNames An array of vertices names
 * @param GraphEdge[] $edges An array of edges
 * @param string $start The starting vertex
 * @return array An array of shortest paths from $start to all other vertices
 */
function bellmanFord(array $verticesNames, array $edges, string $start, bool $verbose = false): array
{
    $vertices = array_combine($verticesNames, array_fill(0, count($verticesNames), PHP_INT_MAX));

    $change = true;
    $round = 1;
    while ($change) {
        if ($verbose) {
            echo "round $round\n";
        }
        $change = false;
        foreach ($vertices as $vertex => $minWeight) {
            if ($verbose) {
                echo "checking vertex $vertex\n";
            }
            if ($start === $vertex) {
                $vertices[$vertex] = 0;
            }

            foreach ($edges[$vertex] as $edge) {
                if ($vertices[$edge->end] > $vertices[$vertex] + $edge->weight) {
                    if ($verbose) {
                        echo "replace $vertex " . $vertices[$edge->end] . " with "
                            . ($vertices[$vertex] + $edge->weight) . "\n ";
                    }
                    $vertices[$edge->end] = $vertices[$vertex] + $edge->weight;
                    $change = true;
                }
            }
        }
        $round++;
    }
    return $vertices;
}
