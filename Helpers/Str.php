<?php

namespace Helpers;

use function array_combine;
use function array_map;
use function array_values;
use function sprintf;
use function strtolower;
use function strtoupper;
use function strtr;
use function ucfirst;

/**
 * Class Str is a set of static string helpers
 *
 * @package Helpers
 */
class Str
{
    /**
     * return string in studly case
     *
     * @param string $str
     *
     * @return string
     */
    public static function toStudly(string $str): string
    {
        // TODO: Should be able to convert hassAn and hass_an to HassAn
        return ucfirst(static::toLower($str));
    }

    /**
     * return a string in upper case
     *
     * @param string $str
     *
     * @return string
     */
    public static function toUpper(string $str): string
    {
        return strtoupper($str);
    }

    /**
     * return a string in lower case
     *
     * @param string $str
     *
     * @return string
     */
    public static function toLower(string $str): string
    {
        return strtolower($str);
    }

    /**
     * Return first match of occurring a pattern on a string
     *
     * @param string $pattern
     * @param string $needle
     *
     * @return string
     */
    public static function firstMatch(string $pattern, string $needle): string
    {
        preg_match_all($pattern, $needle, $matches);

        if (isset($matches[0])) {
            return $matches[0];
        }

        return '';
    }

    /**
     * Translate a given mustache syntax string like `Hello, I'm {name}` to a
     * translated string, based on a given set of information like `['name'
     * => 'Meysam']` (e.g. `I'm Meysam`).
     *
     * @param string $pattern
     * @param array  $values
     *
     * @return string
     */
    public static function mustacheTranslate(
         string $pattern,
         array $values
    ): string {
        $keys = array_map(
             function ($key) {
                 return sprintf("{%s}", $key);
             },
             array_keys($values)
        );

        $values = array_combine($keys, array_values($values));

        return strtr($pattern, $values);
    }
}
