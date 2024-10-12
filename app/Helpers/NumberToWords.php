<?php

namespace App\Helpers;

class NumberToWords
{
    private static $units = [
        '', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan'
    ];

    private static $tens = [
        '', 'Sepuluh', 'Dua Puluh', 'Tiga Puluh', 'Empat Puluh', 'Lima Puluh',
        'Enam Puluh', 'Tujuh Puluh', 'Delapan Puluh', 'Sembilan Puluh'
    ];

    private static $hundreds = [
        '', 'Seratus', 'Dua Ratus', 'Tiga Ratus', 'Empat Ratus', 'Lima Ratus',
        'Enam Ratus', 'Tujuh Ratus', 'Delapan Ratus', 'Sembilan Ratus'
    ];

    private static $thousands = [
        '', 'Ribu', 'Juta', 'Miliar', 'Triliun'
    ];

    public static function convert($number)
    {
        if ($number < 0) {
            return 'Minus ' . self::convert(abs($number));
        }

        if ($number == 0) {
            return 'Nol';
        }

        $words = '';

        $unitIndex = 0;
        while ($number > 0) {
            $chunk = $number % 1000;
            if ($chunk > 0) {
                $chunkWords = self::convertChunk($chunk);
                $words = $chunkWords . ' ' . self::$thousands[$unitIndex] . ' ' . $words;
            }
            $number = (int)($number / 1000);
            $unitIndex++;
        }

        return trim($words);
    }

    private static function convertChunk($number)
    {
        $words = '';

        if ($number >= 100) {
            $hundreds = (int)($number / 100);
            $words .= self::$hundreds[$hundreds] . ' ';
            $number %= 100;
        }

        if ($number >= 10) {
            if ($number < 20) {
                $words .= self::convertTeens($number) . ' ';
                return $words;
            } else {
                $tens = (int)($number / 10);
                $words .= self::$tens[$tens] . ' ';
                $number %= 10;
            }
        }

        if ($number > 0) {
            $words .= self::$units[$number] . ' ';
        }

        return trim($words);
    }

    private static function convertTeens($number)
    {
        $teens = [
            10 => 'Sepuluh', 11 => 'Sebelas', 12 => 'Dua Belas', 13 => 'Tiga Belas',
            14 => 'Empat Belas', 15 => 'Lima Belas', 16 => 'Enam Belas',
            17 => 'Tujuh Belas', 18 => 'Delapan Belas', 19 => 'Sembilan Belas'
        ];

        return $teens[$number];
    }
}
