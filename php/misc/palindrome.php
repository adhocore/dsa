<?php


function is_palindrome($str, $ws = true)
{
    if (!$ws) {
        $str = preg_replace('/\s+/', '', $str);
    }
    $len = strlen($str);
    for ($i = 0, $j = $len - 1; $i < ceil($len / 2); $i++, $j--) {
        if ($str[$i] != $str[$j]) {
            return false;
        }
    }

    return true;
}
