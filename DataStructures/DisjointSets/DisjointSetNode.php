<?php

namespace DataStructures\DisjointSets;

class DisjointSetNode
{
    public mixed $data;     # PHP 8.0^ . Otherwise, define with annotations:  @var int|string|float|null
    public int $rank;
    public DisjointSetNode $parent;

    public function __construct(mixed $data = null)
    {
        $this->data = $data;
        $this->rank = 0;
        $this->parent = $this;  // Initialize parent to itself
    }
}
