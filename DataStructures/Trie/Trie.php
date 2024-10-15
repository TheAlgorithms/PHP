<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request #162 and #172
 * https://github.com/TheAlgorithms/PHP/pull/162
 * https://github.com/TheAlgorithms/PHP/pull/172
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\Trie;

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    /**
     * Get the root node of the Trie.
     */
    public function getRoot(): TrieNode
    {
        return $this->root;
    }

    /**
     * Insert a word into the Trie.
     */
    public function insert(string $word): void
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            $node = $node->addChild($char);
        }
        $node->isEndOfWord = true;
    }

    /**
     * Search for a word in the Trie.
     */
    public function search(string $word): bool
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!$node->hasChild($char)) {
                return false;
            }
            $node = $node->getChild($char);
        }
        return $node->isEndOfWord;
    }

    /**
     * Find all words that start with a given prefix.
     */
    public function startsWith(string $prefix): array
    {
        $prefix = strtolower($prefix);  // Normalize the prefix to lowercase
        $node = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (!$node->hasChild($char)) {
                return [];
            }
            $node = $node->getChild($char);
        }
        return $this->findWordsFromNode($node, $prefix);
    }

    /**
     * Helper function to find all words from a given node.
     */
    private function findWordsFromNode(TrieNode $node, string $prefix): array
    {
        $words = [];
        if ($node->isEndOfWord) {
            $words[] = $prefix;
        }

        foreach ($node->children as $char => $childNode) {
            $words = array_merge($words, $this->findWordsFromNode($childNode, $prefix . $char));
        }

        return $words;
    }

    /**
     * Delete a word from the Trie.
     * Recursively traverses the Trie and removes nodes
     *
     * @param string $word The word to delete.
     * @return bool Returns true if the word was successfully deleted, otherwise false.
     */
    public function delete(string $word): bool
    {
        return $this->deleteHelper($this->root, $word, 0);
    }

    /**
     * Helper function for deleting a word.
     * Recursively traverse the Trie and removes nodes.
     *
     * @param TrieNode $node The current node in the Trie.
     * @param string $word The word being deleted.
     * @param int $index The current index in the word.
     * @return bool Returns true if the current node should be deleted, otherwise false.
     */
    private function deleteHelper(TrieNode $node, string &$word, int $index): bool
    {
        if ($index === strlen($word)) {
            if (!$node->isEndOfWord) {
                return false;
            }
            $node->isEndOfWord = false;
            return empty($node->children);
        }

        $char = $word[$index];
        $childNode = $node->getChild($char);
        if ($childNode === null) {
            return false;
        }

        // Recursively delete the child node
        $shouldDeleteCurrentNode = $this->deleteHelper($childNode, $word, $index + 1);

        if ($shouldDeleteCurrentNode) {
            unset($node->children[$char]);
            return !$node->isEndOfWord;     // true if current node is not the end of another word
        }

        return false;
    }

    /**
     * Recursively traverses the Trie starting from the given node and collects all words.
     *
     * @param TrieNode $node The starting node for traversal.
     * @param string $prefix The prefix of the current path in the Trie.
     * @return array An array of words found in the Trie starting from the given node.
     */
    public function traverseTrieNode(TrieNode $node, string $prefix = ''): array
    {
        $words = [];

        if ($node->isEndOfWord) {
            $words[] = $prefix;
        }

        foreach ($node->children as $char => $childNode) {
            $words = array_merge($words, $this->traverseTrieNode($childNode, $prefix . $char));
        }

        return $words;
    }

    /**
     * Gets all words stored in the Trie.
     *
     * @return array An array of all words in the Trie.
     */
    public function getWords(): array
    {
        return $this->traverseTrieNode($this->root);
    }
}
