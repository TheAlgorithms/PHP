<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #160
 * https://github.com/TheAlgorithms/PHP/pull/160
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

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
