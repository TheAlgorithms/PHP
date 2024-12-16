<?php

namespace DataStructures;

use BinaryTree;

/**
 * Recurrent algorithm to invert binary tree (mirror)
 * (https://medium.com/@kvrware/inverting-binary-tree-b0ff3a5cb0df).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class InvertBinaryTree
{
    public function invert(?BinaryTree $b): void
    {
        if (! $b) {
            return;
        }
        $tmp = $b->getLeft();
        $b->setLeft($b->getRight());
        $b->setRight($tmp);
        $this->invert($b->getLeft());
        $this->invert($b->getRight());
    }
}
