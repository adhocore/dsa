<?php

/**
 * insertion_sort: 
 * 
 * @link   https://en.wikipedia.org/wiki/Insertion_sort
 *
 * @param  array $list The unordered list of numbers
 *
 * @return array       The ordered list of numbers
 */
function insertion_sort(array $list)
{
    for ($i = 0; $i < count($list) - 1; ++$i) {
        for ($j = $i + 1; $j < count($list); ++$j) {
            if ($list[$i] >= $list[$j]) {
                $tmp = $list[$j];
                $list[$j] = $list[$i];
                $list[$i] = $tmp;
            }
        }
    }

    return $list;
}
