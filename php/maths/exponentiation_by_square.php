<?php

/**
 * exponentiation_by_square. https://en.wikipedia.org/wiki/Exponentiation_by_squaring
 *
 * @param int $x  The base
 * @param int $n  The exponent
 *
 * @return float  The value of $x raised to the power $n
 */
function exponentiation_by_square($x, $n)
{
    if ($n < 0) {
        return exponentiation_by_square(1 / $x, -$n);
    } elseif ($n == 0) {
        return 1;
    } elseif ($n == 1) {
        return $x;
    } elseif ($n % 2 == 0) {
        return exponentiation_by_square($x * $x, $n / 2);
    } else {
        return $x * exponentiation_by_square($x * $x, ($n - 1) / 2);
    }
}
