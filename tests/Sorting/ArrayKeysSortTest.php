<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/ArrayKeysSort.php';

use PHPUnit\Framework\TestCase;

class arrayKeysSortTest extends TestCase
{
    public function testArrayKeysSort() {
        //test array of arrays
        $array1 = [
            ['fruit' => 'banana', 'color' => 'yellow', 'cant' => 5],
            ['fruit' => 'apple', 'color' => 'red', 'cant' => 2],
            ['fruit' => 'apple', 'color' => 'green', 'cant' => 7],
            ['fruit' => 'grapes', 'color' => 'purple', 'cant' => 4],
        ];

        $result1 = [
            ['fruit' => 'apple', 'color' => 'red', 'cant' => 2],
            ['fruit' => 'grapes', 'color' => 'purple', 'cant' => 4],
            ['fruit' => 'banana', 'color' => 'yellow', 'cant' => 5],
            ['fruit' => 'apple', 'color' => 'green', 'cant' => 7],
        ];
        $result2 = [
            ['fruit' => 'apple', 'color' => 'green', 'cant' => 7],
            ['fruit' => 'apple', 'color' => 'red', 'cant' => 2],
            ['fruit' => 'banana', 'color' => 'yellow', 'cant' => 5],
            ['fruit' => 'grapes', 'color' => 'purple', 'cant' => 4],
        ];

        $test1 = arrayKeysSort::sort($array1, ['cant']);
        $test2 = arrayKeysSort::sort($array1, ['fruit', 'color']);

        $this->assertEquals($result1, $test1);
        $this->assertEquals($result2, $test2);

        //test array of objects
        $object1 = new \stdClass;
        $object1->fruit = 'banana';
        $object1->color = 'yellow';
        $object1->cant = 5;

        $object2 = new \stdClass;
        $object2->fruit = 'apple';
        $object2->color = 'red';
        $object2->cant = 2;

        $object3 = new \stdClass;
        $object3->fruit = 'apple';
        $object3->color = 'green';
        $object3->cant = 7;

        $object4 = new \stdClass;
        $object4->fruit = 'grapes';
        $object4->color = 'purple';
        $object4->cant = 4;

        $array2 = [$object1, $object2, $object3, $object4];

        $result3 = [$object2, $object4, $object1, $object3];
        $result4 = [$object3, $object2, $object1, $object4];

        $test3 = arrayKeysSort::sort($array2, ['cant']);
        $test4 = arrayKeysSort::sort($array2, ['fruit', 'color']);

        $this->assertEquals($result3, $test3);
        $this->assertEquals($result4, $test4);
    }
}
