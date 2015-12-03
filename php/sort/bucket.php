<?php

/**
 * bucket_sort: 
 * 
 * @link   https://en.wikipedia.org/wiki/Bucket_sort
 *
 * @param  array $list The unordered list of numbers
 *
 * @return array       The ordered list of numbers
 */
function bucket_sort(array $list)
{
    $slot = 10;
    $buckets = array_fill(0, ceil(max($list) / $slot), []);

    for ($i = 0; $i < count($list); ++$i) {
        $k = floor($list[$i] / $slot);
        $buckets[$k][] = $list[$i];
    }

    $merged = [];
    $buckets = array_filter($buckets);
    foreach ($buckets as $b) {
        sort($b);
        $merged = array_merge($merged, $b);
    }

    return $merged;
}
