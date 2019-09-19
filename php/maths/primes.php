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
 * @throws InvalidArgumentException If input is not positive integer
 *
 * @return array The generated prime numbers
 */
function primes($n)
{
    if (!is_numeric($n) or $n < 1) {
        throw new \InvalidArgumentException(sprintf('Expecting positive integer, got %s', $n));
    }
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
 * @uses   self.primes()
 *
 * @param  int  The position in prime number series
 *
 * @throws InvalidArgumentException If input is not positive integer
 *
 * @return int The generated prime number
 */
function prime($n)
{
    $primes = primes($n);

    return end($primes);
}

/**
 * Checks if a number is prime.
 *
 * @param int $x
 *
 * @throws InvalidArgumentException If input is not positive integer
 *
 * @return bool True if prime, false otherwise
 */
function is_prime($x)
{
    if (!is_numeric($x) or $x < 1) {
        throw new \InvalidArgumentException(sprintf('Expecting positive integer, got %s', $x));
    }
    if ($x == 1) {
        return false;
    }
    if ($x == 2 or $x == 3) {
        return true;
    }
    $s = round(sqrt($x));
    for ($i = 2; $i <= $s; $i++) {
        if ($x % $i == 0) {
            return false;
        }
    }

    return true;
}
