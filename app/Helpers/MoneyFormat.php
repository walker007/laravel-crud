<?php

namespace App\Helpers;

class MoneyFormat {

    public static function toInt(string|float|int $value): int
    {
        return (int) str_replace(',','.', str_replace('.','',$value));
    }

    public static function toFloat(string|float|int $value): float
    {
        return (float) str_replace(',', '.',str_replace('.', '', $value));
    }

    public static function toMasked(float $value, int $precision = 2, string $decimal = ',', string $thousand = '.',  string $simbolo = "R$", $simboloBefore = true): string
    {
        return ($simboloBefore ? $simbolo . ' ': null)  . number_format($value, $precision, $decimal, $thousand) . (!$simboloBefore ?  ' '. $simbolo : null);
    }

}
