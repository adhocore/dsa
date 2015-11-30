<?php

/**
 * quick_sort: https://en.wikipedia.org/wiki/Quicksort.
 *
 * @param array $list The unordered list of numbers
 *
 * @return array      The ordered list of numbers
 */
function quick_sort(array $list)
{
    return quick_sort_sort($list, 0, count($list) - 1);
}

/**
 * Used by quick_sort_sort().
 */
function quick_sort_pivot(&$list, $lo, $hi)
{
    $i = $lo;
    $p = $list[$hi];
    for ($j = $lo; $j < $hi; ++$j) {
        if ($list[$j] <= $p) {
            $tmp = $list[$j];
            $list[$j] = $list[$i];
            $list[$i] = $tmp;
            $i = $i + 1;
        }
    }
    $list[$hi] = $list[$i];
    $list[$i] = $p;

    return $i;
}

/**
 * Used by quick_sort().
 */
function quick_sort_sort($list, $lo, $hi)
{
    if ($lo < $hi) {
        $p = quick_sort_pivot($list, $lo, $hi);

        return quick_sort_sort(quick_sort_sort($list, $lo, $p - 1), $p + 1, $hi);
    }

    return $list;
}
