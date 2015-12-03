<?php

/**
 * Tests if a string is palindrome.
 * 
 * @param  string $str The string to test
 * @param  bool   $ws  Consider Whitespace or not (default true)
 * 
 * @return bool        True if palindrome, false if not
 *
 * @throws InvalidArgumentException If input is invalid
 */
function is_palindrome($str, $ws = true)
{
    if (!is_string($str)) {
        throw new \InvalidArgumentException(
            sprintf('Expected string, got %s', gettype($str))
        );
    }
    if (!$ws) {
        $str = preg_replace('/\s+/', '', $str);
    }
    $len = strlen($str);
    for ($i = 0, $j = $len - 1; $i < ceil($len / 2); $i++, $j--) {
        if (strtolower($str[$i]) != strtolower($str[$j])) {
            return false;
        }
    }

    return true;
}
