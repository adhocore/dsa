<?php

/**
 * linear_search.
 *
 * @param array $list The list of items
 * @param mixed $item The lookup item
 *
 * @return mixed The index of item if success, null otherwise
 */
function linear_search(array $list, $item)
{
    for ($i=0; $i < count($list); $i++) {
        if ($list[$i] === $item) {
            return $i;
        }
    }
}
