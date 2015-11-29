<?php

/**
 * greatest_common_divisor. Using Euclid algorithm.
 *
 * @param int $x  The first number
 * @param int $y  The second number
 *
 * @return int    The greated commmon divisor $x and $y
 */
function greatest_common_divisor($x, $y)
{
    while ($y > 0) {
        $x > $y ? ($x = $x - $y) : ($y = $y - $x);
    }

    return $x;
}
