<?php

namespace DataStructures;

use DataStructures\DisjointSets\DisjointSetNode;
use DisjointSet;
use PHPUnit\Framework\TestCase;

class DisjointSetTest extends TestCase
{
    private DisjointSet $ds;
    private array $nodes;

    protected function setUp(): void
    {
        $this->ds = new DisjointSet();
        $this->nodes = [];

        // Create 20 nodes
        for ($i = 0; $i < 20; $i++) {
            $this->nodes[$i] = new DisjointSetNode($i);
        }

        // Perform union operations to form several disjoint sets
        $this->ds->unionSet($this->nodes[0], $this->nodes[1]);
        $this->ds->unionSet($this->nodes[1], $this->nodes[2]);

        $this->ds->unionSet($this->nodes[3], $this->nodes[4]);
        $this->ds->unionSet($this->nodes[4], $this->nodes[5]);

        $this->ds->unionSet($this->nodes[6], $this->nodes[7]);
        $this->ds->unionSet($this->nodes[7], $this->nodes[8]);

        $this->ds->unionSet($this->nodes[9], $this->nodes[10]);
        $this->ds->unionSet($this->nodes[10], $this->nodes[11]);

        $this->ds->unionSet($this->nodes[12], $this->nodes[13]);
        $this->ds->unionSet($this->nodes[13], $this->nodes[14]);

        $this->ds->unionSet($this->nodes[15], $this->nodes[16]);
        $this->ds->unionSet($this->nodes[16], $this->nodes[17]);

        $this->ds->unionSet($this->nodes[18], $this->nodes[19]);
    }

    public function testFindSet(): void
    {
        // Nodes in the same sets should have the same root
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 6; $j++) {
                $setI = $this->ds->findSet($this->nodes[$i]);
                $setJ = $this->ds->findSet($this->nodes[$j]);

                if ($this->inSameSet($i, $j)) {
                    $this->assertSame($setI, $setJ, "Nodes $i and $j should be in the same set");
                } else {
                    $this->assertNotSame($setI, $setJ, "Nodes $i and $j should be in different sets");
                }
            }
        }
    }

    private function inSameSet(int $i, int $j): bool
    {
        // Define which nodes should be in the same set based on union operations
        $sets = [
            [0, 1, 2],      // Set A
            [3, 4, 5],      // Set B
            [6, 7, 8],      // Set C
            [9, 10, 11],    // Set D
            [12, 13, 14],   // Set E
            [15, 16, 17],   // Set F
            [18, 19]        // Set G
        ];

        foreach ($sets as $set) {
            if (in_array($i, $set) && in_array($j, $set)) {
                return true;
            }    
        }

        return false;
    }
}

