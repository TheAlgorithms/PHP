<?php

namespace DataStructures\DisjointSets;

class DisjointSetNode
{
    /**
     * @var int|string|float|null
     */
    // PHP7.4: Defined with annotations
    public $data;       # replace with type hint "mixed" as of PHP 8.0^.
    public int $rank;
    public DisjointSetNode $parent;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->rank = 0;
        $this->parent = $this;  // Initialize parent to itself
    }
}
