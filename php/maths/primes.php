<?php

/**
 * Alternative prime number generator.
 *
 * Generates first <n> prime numbers using 
 * the prime numbers themselves
 *
 * @author Jitendra Adhikari <jiten.adhikary@gmail.com>
 *
 * @param  int   The number of prime numbers to generate
 *
 * @return array The generated prime numbers
 */
function primes($n)
{
    static $p = [2];
    if (isset($p[$n - 1])) {
        return array_slice($p, 0, $n);
    }
    $i = end($p);
    while ($i++) {
        foreach ($p as $_p) {
            if ($i % $_p == 0) {
                continue 2;
            }
        }
        $p[] = $i;
        if (isset($p[$n - 1])) {
            return $p;
        }
    }
}

/**
 * Returns $nth prime number.
 *
 * @author Jitendra Adhikari <jiten.adhikary@gmail.com>
 *
 * @param  int   The position in prime number series
 *
 * @return int   The generated prime number
 */
function prime($n)
{
    return end(primes($n));
}
