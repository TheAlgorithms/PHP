<?php

declare(strict_types=1);

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #163
 * https://github.com/TheAlgorithms/PHP/pull/163
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\AVLTree;

class AVLTreeNode
{
    public int $height = 1;

    /**
     * @param int|string $key
     */
    public function __construct(public $key, public mixed $value, public ?AVLTreeNode $left = null, public ?AVLTreeNode $right = null)
    {
        // New node is initially at height 1
    }

    public function updateHeight(): void
    {
        $leftHeight = $this->left instanceof \DataStructures\AVLTree\AVLTreeNode ? $this->left->height : 0;
        $rightHeight = $this->right instanceof \DataStructures\AVLTree\AVLTreeNode ? $this->right->height : 0;
        $this->height = max($leftHeight, $rightHeight) + 1;
    }

    public function balanceFactor(): int
    {
        $leftHeight = $this->left instanceof \DataStructures\AVLTree\AVLTreeNode ? $this->left->height : 0;
        $rightHeight = $this->right instanceof \DataStructures\AVLTree\AVLTreeNode ? $this->right->height : 0;
        return $leftHeight - $rightHeight;
    }
}
