<?php

/**
 * factorial.
 * 
 * @param  int $n The number to calculate factorial for
 * 
 * @return int    The factorial of $n
 * 
 * @throws InvalidArgumentException  If input is not valid number
 */
function factorial($n)
{
    if (!is_numeric($n)) {
        throw new \InvalidArgumentException(
            sprintf('%s is not valid number', $n)
        );
    }

    return ($n < 2) ? 1 : $n * factorial($n - 1);
}
