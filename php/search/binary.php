<?php

/**
 * binary_search: 
 * 
 * @link   https://en.wikipedia.org/wiki/Binary_search_algorithm
 *
 * @param  array $list The ordered list of items
 * @param  mixed $item The lookup item
 *
 * @return mixed       The index of item if success, null otherwise
 */
function binary_search(array $list, $item)
{
    $lo = 0;
    $hi = count($list) - 1;
    while ($lo <= $hi) {
        $mid = ($lo + $hi) >> 1;
        if ($list[$mid] === $item) {
            return $mid;
        }

        if ($list[$mid] > $item) {
            $hi = $mid - 1;
        } else {
            $lo = $mid + 1;
        }
    }
}
