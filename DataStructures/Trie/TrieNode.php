<?php

namespace DataStructures\Trie;

class TrieNode
{
    /** @var array<string, TrieNode> */
    public array $children;
    public bool $isEndOfWord;

    public function __construct()
    {
        $this->children = [];  // Associative array where [ char => TrieNode ]
        $this->isEndOfWord = false;
    }

    /**
     * Add a child node for a character.
     */
    public function addChild(string $char): TrieNode
    {
        if (!isset($this->children[$char])) {
            $this->children[$char] = new TrieNode();
        }
        return $this->children[$char];
    }

    /**
     * Check if a character has a child node.
     */
    public function hasChild(string $char): bool
    {
        return isset($this->children[$char]);
    }

    /**
     * Get the child node corresponding to a character.
     */
    public function getChild(string $char): ?TrieNode
    {
        return $this->children[$char] ?? null;
    }
}
