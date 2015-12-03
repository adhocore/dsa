<?php

/**
 * bubble_sort: 
 * 
 * @link   https://en.wikipedia.org/wiki/Bubble_sort
 *
 * @param  array $list The unordered list of numbers
 *
 * @return array       The ordered list of numbers
 */
function bubble_sort(array $list)
{
    $n = count($list);
    do {
        $newn = 0;
        for ($i = 1; $i <= $n - 1; ++$i) {
            if ($list[$i - 1] > $list[$i]) {
                $tmp = $list[$i - 1];
                $list[$i - 1] = $list[$i];
                $list[$i] = $tmp;
                $newn = $i;
            }
        }
        $n = $newn;
    } while ($newn !== 0);

    return $list;
}
