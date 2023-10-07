<?php

/**
 * The Depth-first Search is an algorithm used for traversing or searching trees or graphs
 * (https://en.wikipedia.org/wiki/Depth-first_search).
 *
 * This is a non-recursive implementation.
 *
 * References:
 * https://www.geeksforgeeks.org/depth-first-search-or-dfs-for-a-graph/
 *
 * https://the-algorithms.com/algorithm/depth-first-search?lang=python
 *
 * @author Andre Alves https://github.com/andremralves
 * @param array $adjList An array representing the grapth as an Adjacent List
 * @param int|string $start The starting vertex
 * @return array The visited vertices
 */
function dfs($adjList, $start)
{
    $visited = [];
    $stack = [$start];
    while (!empty($stack)) {
        // Removes the ending element from the stack and mark as visited
        $v = array_pop($stack);
        $visited[$v] = 1;

        // Checks each adjacent vertex of $v and add to the stack if not visited
        foreach (array_reverse($adjList[$v]) as $adj) {
            if (!array_key_exists($adj, $visited)) {
                array_push($stack, $adj);
            }
        }
    }
    return array_keys($visited);
}
