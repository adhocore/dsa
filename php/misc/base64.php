<?php

/**
 * Base64 encode. 
 * 
 * @link   https://en.wikipedia.org/wiki/Base64.
 *
 * @param  string $str The input string
 * 
 * @return string      The base64 encoded string
 * 
 * @throws InvalidArgumentException If input string is invalid
 */
function base64encode($str)
{
    if (!is_scalar($str)) {
        throw new \InvalidArgumentException(
            sprintf('base64encode() expects parameter 1 to be string %s given', gettype($str))
        );
    }
    $out = '';
    $str = (string) $str;
    $len = strlen($str);
    $map = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
    for ($i = 0; $i < $len; $i += 3) {
        $b = (ord($str[$i]) & 0xFC) >> 2;
        $out .= $map[$b];
        $b = (ord($str[$i]) & 0x03) << 4;
        if ($i + 1 < $len) {
            $b |= (ord($str[$i + 1]) & 0xF0) >> 4;
            $out .= $map[$b];
            $b = (ord($str[$i + 1]) & 0x0F) << 2;
            if ($i + 2 < $len) {
                $b |= (ord($str[$i + 2]) & 0xC0) >> 6;
                $out .= $map[$b];
                $b = ord($str[$i + 2]) & 0x3F;
                $out .= $map[$b];
            } else {
                $out .= $map[$b];
                $out .= '=';
            }
        } else {
            $out .= $map[$b];
            $out .= '==';
        }
    }

    return $out;
}

/**
 * Base64 decode. 
 * 
 * @link   https://en.wikipedia.org/wiki/Base64.
 *
 * @param  string $str The input base64 string
 * 
 * @return string      The base64 decoded string
 * 
 * @throws InvalidArgumentException If input string is invalid
 */
function base64decode($str)
{
    if (!is_string($str)) {
        throw new \InvalidArgumentException(
            sprintf('base64decode() expects parameter 1 to be string %s given', gettype($str))
        );
    }

    $str = (string) $str;
    $len = strlen($str);
    if ($len % 4 !== 0) {
        throw new \InvalidArgumentException('Invalid base64 string given');
    }

    $out = '';
    $map = array_flip(str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/='));
    for ($i = 0, $j = 0; $i < $len; $i += 4) {
        foreach (range(0, 3) as $k) {
            $b[$k] = $map[$str[$i + $k]];
        }
        $out .= chr(($b[0] << 2) | ($b[1] >> 4));
        if ($b[2] < 64) {
            $out .= chr(($b[1] << 4) | ($b[2] >> 2));
            if ($b[3] < 64) {
                $out .= chr(($b[2] << 6) | $b[3]);
            }
        }
    }

    return $out;
}
