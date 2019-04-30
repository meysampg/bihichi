<?php

namespace Helpers;

/**
 * Class Arr is a set of helpers for working with arrays
 *
 * @package Helpers
 */
class Arr
{
    /**
     * normalize a given array based on standard by filling its empty holes
     *
     * @param array $given
     * @param array $standard
     *
     * @return array
     */
    public static function normalize(array $given, array $standard): array
    {
        foreach ($standard as $key => $value) {
            if (!isset($given[$key]) || is_null($given[$key])) {
                $given[$key] = $value;
            }
        }

        return $given;
    }

    /**
     * fill a given array with a value if the array is empty
     *
     * @param array  $arr
     * @param string $placeholder
     *
     * @return array
     */
    public static function fillEmpty(array $arr, string $placeholder): array
    {
        if (empty($arr)) {
            return [$placeholder];
        }

        return $arr;
    }
}
