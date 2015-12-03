<?php

/**
 * greatest_common_divisor. Using Euclid algorithm.
 *
 * @param int $x The first number
 * @param int $y The second number
 *
 * @return int   The greated commmon divisor $x and $y
 *
 * @throws InvalidArgumentException  If input is not valid number
 */
function greatest_common_divisor($x, $y)
{
    if (!($a = is_numeric($x)) or !is_numeric($y)) {
        throw new \InvalidArgumentException(
            sprintf('%s is not valid number', $a ? $x : $y)
        );
    }

    while ($y > 0) {
        $x > $y ? ($x = $x - $y) : ($y = $y - $x);
    }

    return $x;
}
