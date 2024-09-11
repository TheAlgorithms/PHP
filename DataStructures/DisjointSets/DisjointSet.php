<?php

use DataStructures\DisjointSets\DisjointSetNode;

class DisjointSet
{
    /**
     * Finds the representative of the set that contains the node.
     */
    public function findSet(DisjointSetNode $node): DisjointSetNode
    {
        if ($node !== $node->parent) {
            $node->parent = $this->findSet($node->parent);    // Path compression: make the parent point directly to the root
        }
        return $node->parent;
    }

    /**
     * Unites the sets that contain x and y.
     */
    public function unionSet(DisjointSetNode $nodeX, DisjointSetNode $nodeY): void
    {
        $rootX = $this->findSet($nodeX);
        $rootY = $this->findSet($nodeY);

        if ($rootX === $rootY) {
            return; // They are already in the same set
        }

        // Union by rank: attach the smaller tree under the larger tree
        if ($rootX->rank > $rootY->rank) {
            $rootY->parent = $rootX;
        } else {
            $rootX->parent = $rootY;
            if ($rootX->rank === $rootY->rank) {
                $rootY->rank += 1;
            }
        }
    }
}
