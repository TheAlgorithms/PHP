<?php

namespace DataStructures\BinarySearchTree;

use LogicException;

class DuplicateKeyException extends LogicException
{
    public function __construct($key, $code = 0, LogicException $previous = null)
    {
        $message = "Insertion failed. Duplicate key: " . $key;
        parent::__construct($message, $code, $previous);
    }
}
