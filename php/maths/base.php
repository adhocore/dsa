<?php

/**
 * Converts base of numbers. Supports base 2 to 36.
 * Note: Native support exists http://php.net/base_convert.
 *
 * @author Jitendra Adhikari <jiten.adhikary@gmail.com>
 *
 * @param  string $num      Numeric string.
 * @param  int    $tobase   To base
 * @param  int    $frombase From base (defaults to 10)
 * 
 * @return string           The number with converted base
 * 
 * @throws InvalidArgumentException  If input string or base is invalid
 */
function convert_base($num, $tobase, $frombase = 10)
{
    if ($tobase == $frombase) {
        return $num;
    }

    $map = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($tobase > strlen($map) or $tobase < 2 or
        $frombase > strlen($map) or $frombase < 2
    ) {
        throw new \InvalidArgumentException(
            'Given base not yet supported'
        );
    }

    // Validate $num
    if (trim(strtoupper($num), substr($map, 0, $frombase))) {
        throw new \InvalidArgumentException(
            sprintf('%s is not valid base %s number', $num, $frombase)
        );
    }

    // Adapt to base 10 (only for first go, not used by recursion)
    if (10 != $frombase) {
        $tmp = 0;
        foreach (str_split(strrev($num)) as $pow => $n) {
            $tmp += stripos($map, $n) * pow($frombase, $pow);
        }
        $num = $tmp;
    }

    if ($num < $tobase) {
        return $map[(int) $num];
    }

    return convert_base(floor($num / $tobase), $tobase).$map[$num % $tobase];
}
