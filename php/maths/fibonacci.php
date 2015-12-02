<?php

/**
 * fibonacci. https://en.wikipedia.org/wiki/Fibonacci_number.
 *
 * @param int $n  The position of series
 *
 * @return int    The $nth number in fibonacci series
 */
function fibonacci($n)
{
    if ($n < 0) {
        return ($n % 2) ? fibonacci(-$n) : 0 - fibonacci(-$n);
    } elseif ($n == 0) {
        return 0;
    } elseif ($n == 1 or $n == 2) {
        return 1;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

/**
 * fibonacci_series. https://en.wikipedia.org/wiki/Fibonacci_number
 * uses static stack ($fs) for memoization to accelerate subsquent calls.
 *
 * @author Jitendra Adhikari <jiten.adhikary@gmail.com>
 *
 * @param int $n  The number of fibonacci to generate
 *
 * @return array  The list with n fibonacci numbers
 */
function fibonacci_series($n)
{
    static $fs = [0, 1];
    if ($n < 0) {
        $_fs = [];
        foreach (fibonacci_series(-$n) as $k => $f) {
            $_fs[0 - $k] = ($k % 2) ? $f : -$f;
        }
        ksort($_fs);

        return $_fs;
    }

    if (isset($fs[$n])) {
        return array_slice($fs, 0, $n + 1);
    }

    while (end($fs)) {
        $fs[] = $fs[key($fs)] + $fs[key($fs) - 1];
        if (isset($fs[$n])) {
            return $fs;
        }
    }
}
