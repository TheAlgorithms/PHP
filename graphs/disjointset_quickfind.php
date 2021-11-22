<?php
/**
 * This is the quick find implementation of the DisjoinSet graph data structure
 *
 * DisjointSet's can quickly determine if 2 vertices are connected.
 * Each index in the root array represents a vert
 * Each value in the root array represents the value
 *
 * QuickFind implementation Time Complexity:
 * finding the root node is O(1)
 * unioning 2 vertices is O(N)
 *
 * Typically there is a find() method, but we don't need it since we're using $root directly
 */
class QuickFind_DisjointSet
{
    /**
     * The root array maintains a pointer to each nodes' root value
     * Each node is represented as the $root's indexes
     * e.g. $root[4] = 0 means node 4's root node is 0
     */
    public array $root = [];
    
    /**
     * @param int $size - The size is the number of nodes in the graph
     */
    function __construct(int $size) {
        for($i = 0; $i < $size; $i++)
            $this->root [] = $i;
    }
    
    /**
     * Pass in the array's index. The arrays index represents a node in the graph.
     * Union is how we connect them. We connect them by pointing them to the same root.
     * @param int $x
     * @param int $y
     */
    public function union(int $x, int $y): void {
        $root_x = $this->root[$x];
        $root_y = $this->root[$y];
        if($root_x != $root_y) {
            for($i = 0; $i < count($this->root); $i++) {
                if($this->root[$i] == $root_y) {
                    $this->root[$i] = $root_x;
                }
            }
        }
    }
    
    public function connected(int $x, int $y): string {
        return ($this->root[$x] == $this->root[$y]) ? 'YES' : 'NO';
    }
}


function test_one() {
    # 0, 1, 2, 3, 4
    $qf = new QuickFind_DisjointSet(5);
    
    # 1, 4 | 0, 2 | 3
    # Three disjoint sets (i.e. islands) get created
    $qf->union(1, 4);
    $qf->union(0, 2);
    
    echo "\n";
    echo 'Are 1 and 4 connected? ' . $qf->connected(1, 4) . "\n";
    echo 'Are 0 and 4 connected? ' . $qf->connected(0, 4) . "\n";
    echo 'Are 3 and 4 connected? ' . $qf->connected(3, 4) . "\n";
}

test_one();

//TODO: create more tests



// end of file
