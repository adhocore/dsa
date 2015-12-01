<?php

/**
 * Tests if a string is palindrome.
 * 
 * @param  [type]  $str The string to test
 * @param  boolean $ws  Consider Whitespace or not (default true)
 * 
 * @return boolean      True if palindrome, false if not
 */
function is_palindrome($str, $ws = true)
{
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
