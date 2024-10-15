<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request #162 and #172
 * https://github.com/TheAlgorithms/PHP/pull/162
 * https://github.com/TheAlgorithms/PHP/pull/172
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../DataStructures/Trie/Trie.php';
require_once __DIR__ . '/../../DataStructures/Trie/TrieNode.php';

use DataStructures\Trie\Trie;
use DataStructures\Trie\TrieNode;
use PHPUnit\Framework\TestCase;

class TrieTest extends TestCase
{
    private Trie $trie;

    protected function setUp(): void
    {
        $this->trie = new Trie();
    }

    /**
     * Test insertion and search functionality of the Trie.
    */
    public function testInsertAndSearch()
    {
        $this->trie->insert('the');
        $this->trie->insert('universe');
        $this->trie->insert('is');
        $this->trie->insert('vast');

        $this->assertTrue($this->trie->search('the'), 'Expected "the" to be found in the Trie.');
        $this->assertTrue($this->trie->search('universe'), 'Expected "universe" to be found in the Trie.');
        $this->assertTrue($this->trie->search('is'), 'Expected "is" to be found in the Trie.');
        $this->assertTrue($this->trie->search('vast'), 'Expected "vast" to be found in the Trie.');
        $this->assertFalse(
            $this->trie->search('the universe'),
            'Expected "the universe" not to be found in the Trie.'
        );
    }

    /**
     * Test insertion and search functionality with mixed case words.
     */
    public function testInsertAndSearchMixedCase()
    {
        $this->trie->insert('Apple');
        $this->trie->insert('aPPle');
        $this->assertTrue($this->trie->search('apple'), 'Expected "apple" to be found in the Trie.');
        $this->assertTrue($this->trie->search('APPLE'), 'Expected "APPLE" to be found in the Trie.');
    }

    /**
     * Test insertion and search functionality with special characters.
     */
    public function testInsertAndSearchWithSpecialCharacters()
    {
        $this->trie->insert('hello123');
        $this->trie->insert('user@domain.com');
        $this->assertTrue($this->trie->search('hello123'), 'Expected "hello123" to be found in the Trie.');
        $this->assertTrue(
            $this->trie->search('UseR@domain.CoM'),
            'Expected "user@domain.com" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->trie->search('HELLO123'),
            'Expected "HELLO123" not to be found in the Trie (case-sensitive).'
        );
    }

    /**
     * Test insertion and search functionality with long strings.
     */
    public function testInsertAndSearchLongStrings()
    {
        $longString = str_repeat('a', 1000);
        $this->trie->insert($longString);
        $this->assertTrue($this->trie->search($longString), 'Expected the long string to be found in the Trie.');
    }

    /**
     * Test the startsWith functionality of the Trie.
     */
    public function testStartsWith()
    {
        $this->trie->insert('hello');
        $this->assertEquals(['hello'], $this->trie->startsWith('he'), 'Expected words starting with "he" to be found.');
        $this->assertEquals(
            ['hello'],
            $this->trie->startsWith('hello'),
            'Expected words starting with "hello" to be found.'
        );
        $this->assertEquals(
            [],
            $this->trie->startsWith('world'),
            'Expected no words starting with "world" to be found.'
        );
    }

    /**
     * Test startsWith functionality with mixed case prefixes.
     */
    public function testStartsWithMixedCase()
    {
        $this->trie->insert('PrefixMatch');
        $this->trie->insert('PreFixTesting');
        $this->assertEquals(
            ['prefixmatch', 'prefixtesting'],
            $this->trie->startsWith('prefix'),
            'Expected words starting with "prefix" to be found in the Trie (case-insensitive).'
        );

        $this->assertEquals(
            ['prefixmatch', 'prefixtesting'],
            $this->trie->startsWith('PREFIX'),
            'Expected words starting with "PREFIX" to be found in the Trie (case-insensitive).'
        );
    }

    /**
     * Test deletion of existing words from the Trie.
     */
    public function testDelete()
    {
        $this->trie->insert('the');
        $this->trie->insert('universe');
        $this->trie->insert('is');
        $this->trie->insert('vast');
        $this->trie->insert('big');
        $this->trie->insert('rather');

        // Test deleting an existing word
        $this->trie->delete('the');
        $this->assertFalse($this->trie->search('the'), 'Expected "the" not to be found after deletion.');

        // Test that other words are still present
        $this->assertTrue($this->trie->search('universe'), 'Expected "universe" to be found.');
        $this->assertTrue($this->trie->search('is'), 'Expected "is" to be found.');
        $this->assertTrue($this->trie->search('vast'), 'Expected "vast" to be found.');
        $this->assertTrue($this->trie->search('big'), 'Expected "big" to be found.');
        $this->assertTrue($this->trie->search('rather'), 'Expected "rather" to be found.');
    }

    /**
     * Test deletion of mixed case words from the Trie.
     */
    public function testDeleteMixedCase()
    {
        $this->trie->insert('MixedCase');
        $this->assertTrue($this->trie->search('mixedcase'), 'Expected "mixedcase" to be found before deletion.');

        $this->trie->delete('MIXEDCASE');
        $this->assertFalse(
            $this->trie->search('MixedCase'),
            'Expected "MixedCase" not to be found after deletion (case-insensitive).'
        );
    }

    /**
     * Test deletion of words with special characters.
     */
    public function testDeleteWithSpecialCharacters()
    {
        $this->trie->insert('spec!@l#chars');
        $this->assertTrue(
            $this->trie->search('spec!@l#chars'),
            'Expected "spec!@l#chars" to be found before deletion.'
        );

        $this->trie->delete('SPEC!@L#CHARS');
        $this->assertFalse(
            $this->trie->search('spec!@l#chars'),
            'Expected "spec!@l#chars" not to be found after deletion.'
        );
    }

    /**
     * Test deletion of a non-existent word from the Trie.
     */
    public function testDeleteNonExistentWord()
    {
        $this->trie->delete('nonexistent');
        $this->assertFalse($this->trie->search('nonexistent'), 'Expected "nonexistent" to not be found.');
    }

    /**
     * Test traversal of the Trie and retrieval of words.
     */
    public function testTraverseTrieNode()
    {
        $this->trie->insert('hello');
        $this->trie->insert('helium');
        $this->trie->insert('helicopter');

        $words = $this->trie->getWords();
        $this->assertContains('hello', $words, 'Expected "hello" to be found in the Trie.');
        $this->assertContains('helium', $words, 'Expected "helium" to be found in the Trie.');
        $this->assertContains('helicopter', $words, 'Expected "helicopter" to be found in the Trie.');
        $this->assertCount(3, $words, 'Expected 3 words in the Trie.');
    }

    /**
     * Test behavior of an empty Trie.
     */
    public function testEmptyTrie()
    {
        $this->assertEquals([], $this->trie->getWords(), 'Expected an empty Trie to return an empty array.');
    }

    /**
     * Test retrieval of words from the Trie.
     */
    public function testGetWords()
    {
        $this->trie->insert('apple');
        $this->trie->insert('app');
        $this->trie->insert('applet');

        $words = $this->trie->getWords();
        $this->assertContains('apple', $words, 'Expected "apple" to be found in the Trie.');
        $this->assertContains('app', $words, 'Expected "app" to be found in the Trie.');
        $this->assertContains('applet', $words, 'Expected "applet" to be found in the Trie.');
        $this->assertCount(3, $words, 'Expected 3 words in the Trie.');
    }

    /**
     * Test insertion of an empty string into the Trie.
     */
    public function testInsertEmptyString()
    {
        $this->trie->insert('');
        $this->assertTrue($this->trie->search(''), 'Expected empty string to be found in the Trie.');
    }

    /**
     * Test deletion of an empty string from the Trie.
     */
    public function testDeleteEmptyString()
    {
        $this->trie->insert('');
        $this->trie->delete('');
        $this->assertFalse($this->trie->search(''), 'Expected empty string not to be found after deletion.');
    }

    /**
     * Test the startsWith functionality with a common prefix.
     */
    public function testStartsWithWithCommonPrefix()
    {
        $this->trie->insert('trie');
        $this->trie->insert('tried');
        $this->trie->insert('trier');

        $words = $this->trie->startsWith('tri');
        $this->assertContains('trie', $words, 'Expected "trie" to be found with prefix "tri".');
        $this->assertContains('tried', $words, 'Expected "tried" to be found with prefix "tri".');
        $this->assertContains('trier', $words, 'Expected "trier" to be found with prefix "tri".');
        $this->assertCount(3, $words, 'Expected 3 words with prefix "tri".');
    }

    /**
     * Test retrieval of the root node of the Trie.
     */
    public function testGetRoot()
    {
        $root = $this->trie->getRoot();
        $this->assertInstanceOf(TrieNode::class, $root, 'Expected root to be an instance of TrieNode.');
        $this->assertFalse($root->isEndOfWord, 'Expected the root node not to be the end of a word.');
        $this->assertCount(0, $root->children, 'Expected the root node to have no children initially.');
    }

    /**
     * Test retrieval of the root node after populating the Trie with words.
     */
    public function testGetRootAfterPopulation()
    {
        $this->trie->insert('TheAlgorithms');
        $this->trie->insert('PHP');
        $this->trie->insert('DSA');

        $root = $this->trie->getRoot();

        $this->assertInstanceOf(TrieNode::class, $root, 'Expected root to be an instance of TrieNode.');

        // Assert that the root node is not marked as the end of a word
        $this->assertFalse($root->isEndOfWord, 'Expected the root node not to be the end of a word.');

        // Assert that the root node has children corresponding to the inserted words
        $this->assertCount(3, $root->children, 'Expected the root node to have 3 children after inserting words.');
        $this->assertTrue($root->hasChild('t'), 'Expected root to have a child for "t".');
        $this->assertTrue($root->hasChild('p'), 'Expected root to have a child for "p".');
        $this->assertTrue($root->hasChild('D'), 'Expected root to have a child for "D".');
    }
}
