<?php

/**
 *  Sort an "Array of objects" or "Array of arrays" by keys
 */

class ArrayKeysSort
{
    public const ORDER_ASC = 'ASC';
    public const ORDER_DESC = 'DESC';
/**
     * @param $collection
     * @param array $keys
     * @param string $order
     * @param bool $isCaseSensitive
     * @return mixed
     */
    public static function sort($collection, array $keys, string $order = self::ORDER_ASC, bool $isCaseSensitive = false)
    {
        if (!empty($collection) && !empty($keys)) {
            try {
                usort($collection, function ($a, $b) use ($keys, $order, $isCaseSensitive) {

                        $pos = 0;
                    do {
                            $key = $keys[$pos];
                        if (is_array($a)) {
                            if (!isset($a[$key]) || !isset($b[$key])) {
                                $errorMsg = 'The key "' . $key
                                        . '" does not exist in the collection';
                                throw new Exception($errorMsg);
                            }
                            $item1 = !$isCaseSensitive
                            ? strtolower($a[$key]) : $a[$key];
                            $item2 = !$isCaseSensitive
                            ? strtolower($b[$key]) : $b[$key];
                        } else {
                            if (!isset($a->$key) || !isset($b->$key)) {
                                $errorMsg = 'The key "' . $key
                                        . '" does not exist in the collection';
                                throw new Exception($errorMsg);
                            }
                            $item1 = !$isCaseSensitive
                            ? strtolower($a->$key) : $a->$key;
                            $item2 = !$isCaseSensitive
                            ? strtolower($b->$key) : $b->$key;
                        }
                    } while ($item1 === $item2 && !empty($keys[++$pos]));
                    if ($item1 === $item2) {
                        return 0;
                    } elseif ($order === self::ORDER_ASC) {
                        return ($item1 < $item2) ? -1 : 1;
                    } else {
                        return ($item1 > $item2) ? -1 : 1;
                    }
                });
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }

        return $collection;
    }
}
