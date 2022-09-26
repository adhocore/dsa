<?php

/**
 * merge_sort:.
 *
 * @link   https://en.wikipedia.org/wiki/Merge_sort
 *
 * @param array $list The unordered list of numbers
 *
 * @return array The ordered list of numbers
 */
function merge_sort(array $list)
{
    if (1 === count($list)) {
        return $list;
    }

    $left  = merge_sort(array_slice($list, 0, floor(count($list) / 2)));
    $right = merge_sort(array_slice($list, floor(count($list) / 2)));

    $merged = [];
    while (count($left) > 0 or count($right) > 0) {
        if (count($left) > 0 and count($right) > 0) {
            if ($left[0] <= $right[0]) {
                $merged[] = array_shift($left);
            } else {
                $merged[] = array_shift($right);
            }
        } elseif (count($left) > 0) {
            $merged[] = array_shift($left);
        } elseif (count($right) > 0) {
            $merged[] = array_shift($right);
        }
    }

    return $merged;
}
