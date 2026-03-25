<?php

declare(strict_types=1);

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request #166
 * https://github.com/TheAlgorithms/PHP/pull/166
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\SegmentTree;

class SegmentTreeNode
{
    public ?SegmentTreeNode $left = null;

    public ?SegmentTreeNode $right = null;

    /**
     * @param int $start The starting index of the range.
     * @param int $end The ending index of the range.
     * @param int|float $value The initial aggregated value for this range (e.g. sum, min, or max).
     * calculated using a callback. Defaults to sum.
     */
    public function __construct(public int $start, public int $end, public $value)
    {
    }
}
