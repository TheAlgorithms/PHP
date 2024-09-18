<?php

namespace DataStructures;

require_once __DIR__ . '/../../DataStructures/Trie/Trie.php';
require_once __DIR__ . '/../../DataStructures/Trie/TrieNode.php';

use DataStructures\Trie\Trie;
use PHPUnit\Framework\TestCase;

class TrieTest extends TestCase
{
    private Trie $trie;

    protected function setUp(): void
    {
        $this->trie = new Trie();
    }

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

    public function testDelete()
    {
        // Insert words into the Trie
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

    public function testDeleteNonExistentWord()
    {
        $this->trie->delete('nonexistent');
        $this->assertFalse($this->trie->search('nonexistent'), 'Expected "nonexistent" to not be found.');
    }

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

    public function testEmptyTrie()
    {
        $this->assertEquals([], $this->trie->getWords(), 'Expected an empty Trie to return an empty array.');
    }

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

    public function testInsertEmptyString()
    {
        $this->trie->insert('');
        $this->assertTrue($this->trie->search(''), 'Expected empty string to be found in the Trie.');
    }

    public function testDeleteEmptyString()
    {
        $this->trie->insert('');
        $this->trie->delete('');
        $this->assertFalse($this->trie->search(''), 'Expected empty string not to be found after deletion.');
    }

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
}
