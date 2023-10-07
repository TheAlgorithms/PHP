<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Sorting/BubbleSort.php';
require_once __DIR__ . '/../../Sorting/BubbleSort2.php';
require_once __DIR__ . '/../../Sorting/CountSort.php';
require_once __DIR__ . '/../../Sorting/HeapSort.php';
require_once __DIR__ . '/../../Sorting/InsertionSort.php';
require_once __DIR__ . '/../../Sorting/MergeSort.php';
require_once __DIR__ . '/../../Sorting/QuickSort.php';
require_once __DIR__ . '/../../Sorting/RadixSort.php';
require_once __DIR__ . '/../../Sorting/SelectionSort.php';
require_once __DIR__ . '/../../Sorting/TimSort.php';

class SortingTests extends TestCase
{
    public function testBubbleSort()
    {
        $array = [1, 5, 4, 2, 3];
        $sorted = bubbleSort($array);
        $this->assertEquals([1, 2, 3, 4, 5], $sorted);
    }

    public function testBubbleSort2()
    {
        $array = [
            51158, 1856, 8459, 67957, 59748, 58213, 90876, 39621, 66570, 64204, 79935, 27892, 47615, 94706, 34201,
            74474, 63968, 4337, 43688, 42685, 31577, 5239, 25385, 56301, 94083, 23232, 67025, 44044, 74813, 34671,
            90235, 65764, 49709, 12440, 21165, 20620, 38265, 12973, 25236, 93144, 13720, 4204, 77026, 42348, 19756,
            97222, 78828, 73437, 48208, 69858, 19713, 29411, 49809, 66174, 5257, 43340, 40565, 9592, 52328, 16677,
            38386, 55416, 99519, 13732, 84076, 52905, 47662, 31805, 46184, 2811, 35374, 50800, 53635, 51886, 49052,
            75197, 3720, 75045, 28309, 63771, 71526, 16122, 36625, 44654, 86814, 98845, 44637, 54955, 24714, 81960,
            78095, 49048, 99711, 272, 45755, 31919, 8181, 1392, 15352, 82656, 27760, 18362, 43780, 50209, 51433, 2847,
            62310, 87450, 22874, 40789, 56841, 52928, 5523, 76474, 8935, 63245, 16387, 21746, 47596, 84402, 49168,
            58223, 26993, 55908, 92837, 64208, 86309, 30819, 83638, 9508, 44628, 10786, 68125, 14123, 70474, 50596,
            44518, 74872, 61968, 36828, 17860, 4605, 68756, 86070, 52068, 51830, 56992, 45799, 42422, 68514, 92559,
            40206, 31263, 71774, 14202, 94807, 25774, 15003, 54211, 18708, 32074, 43836, 48964, 40742, 26281, 67338,
            75786, 34925, 34649, 45519, 72472, 80188, 40858, 83246, 92215, 66178, 67452, 86198, 82300, 45894, 97156,
            73907, 31159, 7018, 55549, 35245, 68975, 88246, 14098, 59973, 7762, 40459, 86358, 63178, 47489, 55515,
            79488, 46528, 99272, 10867, 75190, 56963, 5520, 56494, 42310, 40171, 78105, 29724, 30110, 28493, 36141,
            22479, 85799, 70466, 92106, 16868, 57402, 4813, 47432, 24689, 78533, 97577, 32178, 30258, 82785, 56063,
            76277, 96407, 77849, 1807, 45344, 30298, 18158, 49935, 90728, 22192, 36852, 33982, 66206, 30948, 40372,
            33446, 99156, 28651, 61591, 79028, 1689, 94257, 32158, 11122, 81097, 57981, 26277, 7515, 7873, 8350, 28229,
            24105, 76818, 86897, 18456, 29373, 7853, 24932, 93070, 4696, 63015, 9358, 28302, 3938, 11754, 33679, 18492,
            91503, 63395, 12029, 23954, 27230, 58336, 16544, 23606, 61349, 37348, 78629, 96145, 57954, 32392, 76201,
            54616, 59992, 5676, 97799, 47910, 98758, 75043, 72849, 6466, 68831, 2246, 69091, 22296, 6506, 93729, 86968,
            39583, 46186, 96782, 19074, 46574, 46704, 99211, 55295, 33963, 77977, 86805, 72686
        ];
        $sorted = bubbleSort2($array);
        $this->assertEquals([
            272, 1392, 1689, 1807, 1856, 2246, 2811, 2847, 3720, 3938, 4204, 4337, 4605, 4696, 4813, 5239, 5257, 5520,
            5523, 5676, 6466, 6506, 7018, 7515, 7762, 7853, 7873, 8181, 8350, 8459, 8935, 9358, 9508, 9592, 10786,
            10867, 11122, 11754, 12029, 12440, 12973, 13720, 13732, 14098, 14123, 14202, 15003, 15352, 16122, 16387,
            16544, 16677, 16868, 17860, 18158, 18362, 18456, 18492, 18708, 19074, 19713, 19756, 20620, 21165, 21746,
            22192, 22296, 22479, 22874, 23232, 23606, 23954, 24105, 24689, 24714, 24932, 25236, 25385, 25774, 26277,
            26281, 26993, 27230, 27760, 27892, 28229, 28302, 28309, 28493, 28651, 29373, 29411, 29724, 30110, 30258,
            30298, 30819, 30948, 31159, 31263, 31577, 31805, 31919, 32074, 32158, 32178, 32392, 33446, 33679, 33963,
            33982, 34201, 34649, 34671, 34925, 35245, 35374, 36141, 36625, 36828, 36852, 37348, 38265, 38386, 39583,
            39621, 40171, 40206, 40372, 40459, 40565, 40742, 40789, 40858, 42310, 42348, 42422, 42685, 43340, 43688,
            43780, 43836, 44044, 44518, 44628, 44637, 44654, 45344, 45519, 45755, 45799, 45894, 46184, 46186, 46528,
            46574, 46704, 47432, 47489, 47596, 47615, 47662, 47910, 48208, 48964, 49048, 49052, 49168, 49709, 49809,
            49935, 50209, 50596, 50800, 51158, 51433, 51830, 51886, 52068, 52328, 52905, 52928, 53635, 54211, 54616,
            54955, 55295, 55416, 55515, 55549, 55908, 56063, 56301, 56494, 56841, 56963, 56992, 57402, 57954, 57981,
            58213, 58223, 58336, 59748, 59973, 59992, 61349, 61591, 61968, 62310, 63015, 63178, 63245, 63395, 63771,
            63968, 64204, 64208, 65764, 66174, 66178, 66206, 66570, 67025, 67338, 67452, 67957, 68125, 68514, 68756,
            68831, 68975, 69091, 69858, 70466, 70474, 71526, 71774, 72472, 72686, 72849, 73437, 73907, 74474, 74813,
            74872, 75043, 75045, 75190, 75197, 75786, 76201, 76277, 76474, 76818, 77026, 77849, 77977, 78095, 78105,
            78533, 78629, 78828, 79028, 79488, 79935, 80188, 81097, 81960, 82300, 82656, 82785, 83246, 83638, 84076,
            84402, 85799, 86070, 86198, 86309, 86358, 86805, 86814, 86897, 86968, 87450, 88246, 90235, 90728, 90876,
            91503, 92106, 92215, 92559, 92837, 93070, 93144, 93729, 94083, 94257, 94706, 94807, 96145, 96407, 96782,
            97156, 97222, 97577, 97799, 98758, 98845, 99156, 99211, 99272, 99519, 99711
        ], $sorted);
    }

    public function testCountSort()
    {
        $array = [-5, -10, 0, -3, 8, 5, -1, 10];
        $min = 0;
        $max = 9;
        $sorted = countSort($array, 0, 9);
        $this->assertEquals([-10, -5, -3, -1, 0, 5, 8, 10], $sorted);
    }

    public function testInsertionSort()
    {
        $array = [1, 5, 4, 2, 3];
        $sorted = insertionSort($array);
        $this->assertEquals([1, 2, 3, 4, 5], $sorted);
    }

    public function testMergeSort()
    {
        $array = [1, 5, 4, 2, 3];
        $sorted = mergeSort($array);
        $this->assertEquals([1, 2, 3, 4, 5], $sorted);
    }

    public function testQuickSort()
    {
        $array = [
            51158, 1856, 8459, 67957, 59748, 58213, 90876, 39621, 66570, 64204, 79935, 27892, 47615, 94706, 34201,
            74474, 63968, 4337, 43688, 42685, 31577, 5239, 25385, 56301, 94083, 23232, 67025, 44044, 74813, 34671,
            90235, 65764, 49709, 12440, 21165, 20620, 38265, 12973, 25236, 93144, 13720, 4204, 77026, 42348, 19756,
            97222, 78828, 73437, 48208, 69858, 19713, 29411, 49809, 66174, 5257, 43340, 40565, 9592, 52328, 16677,
            38386, 55416, 99519, 13732, 84076, 52905, 47662, 31805, 46184, 2811, 35374, 50800, 53635, 51886, 49052,
            75197, 3720, 75045, 28309, 63771, 71526, 16122, 36625, 44654, 86814, 98845, 44637, 54955, 24714, 81960,
            78095, 49048, 99711, 272, 45755, 31919, 8181, 1392, 15352, 82656, 27760, 18362, 43780, 50209, 51433, 2847,
            62310, 87450, 22874, 40789, 56841, 52928, 5523, 76474, 8935, 63245, 16387, 21746, 47596, 84402, 49168,
            58223, 26993, 55908, 92837, 64208, 86309, 30819, 83638, 9508, 44628, 10786, 68125, 14123, 70474, 50596,
            44518, 74872, 61968, 36828, 17860, 4605, 68756, 86070, 52068, 51830, 56992, 45799, 42422, 68514, 92559,
            40206, 31263, 71774, 14202, 94807, 25774, 15003, 54211, 18708, 32074, 43836, 48964, 40742, 26281, 67338,
            75786, 34925, 34649, 45519, 72472, 80188, 40858, 83246, 92215, 66178, 67452, 86198, 82300, 45894, 97156,
            73907, 31159, 7018, 55549, 35245, 68975, 88246, 14098, 59973, 7762, 40459, 86358, 63178, 47489, 55515,
            79488, 46528, 99272, 10867, 75190, 56963, 5520, 56494, 42310, 40171, 78105, 29724, 30110, 28493, 36141,
            22479, 85799, 70466, 92106, 16868, 57402, 4813, 47432, 24689, 78533, 97577, 32178, 30258, 82785, 56063,
            76277, 96407, 77849, 1807, 45344, 30298, 18158, 49935, 90728, 22192, 36852, 33982, 66206, 30948, 40372,
            33446, 99156, 28651, 61591, 79028, 1689, 94257, 32158, 11122, 81097, 57981, 26277, 7515, 7873, 8350, 28229,
            24105, 76818, 86897, 18456, 29373, 7853, 24932, 93070, 4696, 63015, 9358, 28302, 3938, 11754, 33679, 18492,
            91503, 63395, 12029, 23954, 27230, 58336, 16544, 23606, 61349, 37348, 78629, 96145, 57954, 32392, 76201,
            54616, 59992, 5676, 97799, 47910, 98758, 75043, 72849, 6466, 68831, 2246, 69091, 22296, 6506, 93729, 86968,
            39583, 46186, 96782, 19074, 46574, 46704, 99211, 55295, 33963, 77977, 86805, 72686
        ];
        $sorted = quickSort($array);
        $this->assertEquals([
            272, 1392, 1689, 1807, 1856, 2246, 2811, 2847, 3720, 3938, 4204, 4337, 4605, 4696, 4813, 5239, 5257, 5520,
            5523, 5676, 6466, 6506, 7018, 7515, 7762, 7853, 7873, 8181, 8350, 8459, 8935, 9358, 9508, 9592, 10786,
            10867, 11122, 11754, 12029, 12440, 12973, 13720, 13732, 14098, 14123, 14202, 15003, 15352, 16122, 16387,
            16544, 16677, 16868, 17860, 18158, 18362, 18456, 18492, 18708, 19074, 19713, 19756, 20620, 21165, 21746,
            22192, 22296, 22479, 22874, 23232, 23606, 23954, 24105, 24689, 24714, 24932, 25236, 25385, 25774, 26277,
            26281, 26993, 27230, 27760, 27892, 28229, 28302, 28309, 28493, 28651, 29373, 29411, 29724, 30110, 30258,
            30298, 30819, 30948, 31159, 31263, 31577, 31805, 31919, 32074, 32158, 32178, 32392, 33446, 33679, 33963,
            33982, 34201, 34649, 34671, 34925, 35245, 35374, 36141, 36625, 36828, 36852, 37348, 38265, 38386, 39583,
            39621, 40171, 40206, 40372, 40459, 40565, 40742, 40789, 40858, 42310, 42348, 42422, 42685, 43340, 43688,
            43780, 43836, 44044, 44518, 44628, 44637, 44654, 45344, 45519, 45755, 45799, 45894, 46184, 46186, 46528,
            46574, 46704, 47432, 47489, 47596, 47615, 47662, 47910, 48208, 48964, 49048, 49052, 49168, 49709, 49809,
            49935, 50209, 50596, 50800, 51158, 51433, 51830, 51886, 52068, 52328, 52905, 52928, 53635, 54211, 54616,
            54955, 55295, 55416, 55515, 55549, 55908, 56063, 56301, 56494, 56841, 56963, 56992, 57402, 57954, 57981,
            58213, 58223, 58336, 59748, 59973, 59992, 61349, 61591, 61968, 62310, 63015, 63178, 63245, 63395, 63771,
            63968, 64204, 64208, 65764, 66174, 66178, 66206, 66570, 67025, 67338, 67452, 67957, 68125, 68514, 68756,
            68831, 68975, 69091, 69858, 70466, 70474, 71526, 71774, 72472, 72686, 72849, 73437, 73907, 74474, 74813,
            74872, 75043, 75045, 75190, 75197, 75786, 76201, 76277, 76474, 76818, 77026, 77849, 77977, 78095, 78105,
            78533, 78629, 78828, 79028, 79488, 79935, 80188, 81097, 81960, 82300, 82656, 82785, 83246, 83638, 84076,
            84402, 85799, 86070, 86198, 86309, 86358, 86805, 86814, 86897, 86968, 87450, 88246, 90235, 90728, 90876,
            91503, 92106, 92215, 92559, 92837, 93070, 93144, 93729, 94083, 94257, 94706, 94807, 96145, 96407, 96782,
            97156, 97222, 97577, 97799, 98758, 98845, 99156, 99211, 99272, 99519, 99711
        ], $sorted);
    }

    public function testQuickSortWithEmptyInput()
    {
        $array = [];
        $sorted = quickSort($array);
        $this->assertEmpty($sorted);
    }

    public function testRadixSort()
    {
        $array = [1, 5, 4, 2, 3];
        $sorted = radixSort($array);
        $this->assertEquals([1, 2, 3, 4, 5], $sorted);
    }

    public function testSelectionSort()
    {
        $array = [1, 5, 4, 2, 3];
        $sorted = selectionSort($array);
        $this->assertEquals([1, 2, 3, 4, 5], $sorted);
    }

    public function testBubbleSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        bubbleSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testBubbleSort2Performance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        bubbleSort2($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testCountSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        countSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testInsertionSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        insertionSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testMergeSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        mergeSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testQuickSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        quickSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testRadixSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        radixSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testSelectionSortPerformance()
    {
        $array = range(1, 1000000);
        $start = microtime(true);
        selectionSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testCountSortCipher()
    {
        $firstArray = array(20, 16, -5, -8, 6, 12, 2, 4, -3, 9);
        $expectedResultOne = array(-8, -5, -3, 2, 4, 6, 9, 12, 16, 20);
        $secondArray = array(-6, 12, 14, 17, 5, 4, -9, 15, 0, -8);
        $expectedResultTwo = array(-9, -8, -6, 0, 4, 5, 12, 14, 15, 17);

        $resultOne = countSort($firstArray, $minRange = -10, $maxRange = 20);
        $resultTwo = countSort($secondArray, $minRange = -10, $maxRange = 20);

        $this->assertEquals($expectedResultOne, $resultOne);
        $this->assertEquals($expectedResultTwo, $resultTwo);
    }

    public function testQuickSortCipher()
    {
        $array1 = [20, 16, -5, -8, 6, 12, 2, 4, -3, 9];
        $array2 = [-6, 12, 14, 17, 5, 4, -9, 15, 0, -8];

        $result1 = [-8, -5, -3, 2, 4, 6, 9, 12, 16, 20];
        $result2 = [-9, -8, -6, 0, 4, 5, 12, 14, 15, 17];

        $test1 = quickSort($array1);
        $test2 = quickSort($array2);

        $this->assertEquals($result1, $test1);
        $this->assertEquals($result2, $test2);
    }

    public function testHeapSortPerformance()
    {
        $array = range(1, 1000000);
        shuffle($array);  // Randomize the order
        $start = microtime(true);
        heapSort($array);
        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    public function testHeapSortCipher()
    {
        $firstArray = [20, 16, -5, -8, 6, 12, 2, 4, -3, 9];
        $expectedResultOne = [-8, -5, -3, 2, 4, 6, 9, 12, 16, 20];

        $secondArray = [-6, 12, 14, 17, 5, 4, -9, 15, 0, -8];
        $expectedResultTwo = [-9, -8, -6, 0, 4, 5, 12, 14, 15, 17];

        $resultOne = heapSort($firstArray);
        $resultTwo = heapSort($secondArray);

        $this->assertEquals($expectedResultOne, $resultOne);
        $this->assertEquals($expectedResultTwo, $resultTwo);
    }

    public function testTimSortCipher()
    {
        $firstArray = [20, 16, -5, -8, 6, 12, 2, 4, -3, 9];
        $expectedResultOne = [-8, -5, -3, 2, 4, 6, 9, 12, 16, 20];

        $secondArray = [-6, 12, 14, 17, 5, 4, -9, 15, 0, -8];
        $expectedResultTwo = [-9, -8, -6, 0, 4, 5, 12, 14, 15, 17];

        $resultOne = timSort($firstArray);
        $resultTwo = timSort($secondArray);

        $this->assertEquals($expectedResultOne, $resultOne);
        $this->assertEquals($expectedResultTwo, $resultTwo);
    }
}
