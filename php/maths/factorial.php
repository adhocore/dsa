<?php

/**
 * factorial
 * 
 * @param  int $n The number to calculate factorial for
 * 
 * @return int    The factorial of $n
 */
function factorial($n)
{
    return ($n < 2) ? 1 : $n * factorial($n - 1);
}
