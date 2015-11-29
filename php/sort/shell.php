<?php

/**
 * shell_sort: https://en.wikipedia.org/wiki/Shellsort
 *
 * @param  array $list The unordered list of numbers
 *
 * @return array       The ordered list of numbers
 */
function shell_sort(array $list)
{
    $it = round(count($list) / 2);

    while ($it > 0) {
        for ($i = $it; $i < count($list); ++$i) {
            $ins = $list[$i];
            $j = $i;
            while ($j >= $it and $list[$j - $it] > $ins) {
                $list[$j] = $list[$j - $it];
                $j -= $it;
            }

            $list[$j] = $ins;
        }

        $it = round($it / 2.2);
    }

    return $list;
}
