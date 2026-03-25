<?php

declare(strict_types=1);

/**
 *  Sort an "Array of objects" or "Array of arrays" by keys
 */

class ArrayKeysSort
{
    public const ORDER_ASC = 'ASC';

    public const ORDER_DESC = 'DESC';

    /**
     * @param $collection
     * @return mixed
     */
    public static function sort($collection, array $keys, string $order = self::ORDER_ASC, bool $isCaseSensitive = false)
    {
        if (!empty($collection) && $keys !== []) {
            try {
                usort($collection, function ($a, $b) use ($keys, $order, $isCaseSensitive): int {

                    $pos = 0;
                    do {
                        $key = $keys[$pos];
                        if (is_array($a)) {
                            if (!isset($a[$key]) || !isset($b[$key])) {
                                $errorMsg = 'The key "' . $key
                                        . '" does not exist in the collection';
                                throw new Exception($errorMsg);
                            }

                            $item1 = $isCaseSensitive
                            ? $a[$key] : strtolower((string) $a[$key]);
                            $item2 = $isCaseSensitive
                            ? $b[$key] : strtolower((string) $b[$key]);
                        } else {
                            if (!isset($a->$key) || !isset($b->$key)) {
                                $errorMsg = 'The key "' . $key
                                        . '" does not exist in the collection';
                                throw new Exception($errorMsg);
                            }

                            $item1 = $isCaseSensitive
                            ? $a->$key : strtolower((string) $a->$key);
                            $item2 = $isCaseSensitive
                            ? $b->$key : strtolower((string) $b->$key);
                        }
                    } while ($item1 === $item2 && !empty($keys[++$pos]));
                    if ($item1 === $item2) {
                        return 0;
                    }

                    if ($order === self::ORDER_ASC) {
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
