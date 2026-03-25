<?php

declare(strict_types=1);

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
    # replace with type hint "mixed" as of PHP 8.0^.
    public int $rank = 0;

    public DisjointSetNode $parent;

    /**
     * @param int|string|float|null $data
     */
    public function __construct(public $data = null)
    {
        $this->parent = $this;  // Initialize parent to itself
    }
}
