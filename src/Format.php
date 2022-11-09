<?php

/**
 * Copyright James PRO B.V.
 */

namespace JamesPro\StringToNumber;

class Format
{
    static function roundNumber(float $number, float $precision): float
    {
        $number_of_decimals = (int)strpos(strrev($number), ".");
        if ($number_of_decimals === false || $number_of_decimals === 0) {
            return round($number, $precision);
        }

        while ($number_of_decimals >= $precision) {
            $number = round($number, $number_of_decimals);
            $number_of_decimals--;
        }

        return $number;
    }

    static function convert(mixed $string)
    {
        $type = gettype($string);
        if ($type === 'string') {
            if (preg_match('(\.\d{3}\,)', $string)) {
                $number = str_replace('.', '', $string);
                $number = str_replace(',', '.', $number);
            } elseif (strstr($string, ',') && !strstr($string, '.')) {
                $number = str_replace(',', '.', $string);
            } elseif (strstr($string, ',')) {
                $number = str_replace(',', '', $string);
            } else {
                $number = $string;
            }
        } else if ($type === 'integer' || $type === 'double') {
            $number = $string;
        } else {
            return false;
        }

        return $number;
    }

    static function makeNumber(float|string $number, float $precision = null): float
    {
        $number = self::convert($number);

        if ($precision !== null) {
            return self::roundNumber($number, $precision);
        } else {
            return floatval($number);
        }
    }

    static function makeCurrency(float|string $number, string $decimal_separetor = '.', string $thousand_separetor = ''): string
    {
        $float = self::makeNumber($number, 2);
        return number_format($float, 2, $decimal_separetor, $thousand_separetor);
    }

}
