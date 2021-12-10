<?php

namespace App\Helpers;

class DocumentFormat {

    public static function toInt(string $valor): int
    {
        return str_replace(['.','-','/'],'',$valor);
    }

    public static function documento(string|int $valor): string
    {
        if(strlen($valor) == 11)
        {
            return self::cpf($valor);
        }

        return self::cnpj($valor);
    }

    public static function cpf(string|int $valor): string
    {
        return substr($valor, 0, 3) . '.' .
               substr($valor, 3, 3) . '.' .
               substr($valor, 6, 3) . '.' .
               substr($valor, 9, 2);
    }

    public static function cnpj(string|int $valor): string
    {
        return substr($valor, 0, 2) . '.' .
               substr($valor, 2, 3) . '.' .
               substr($valor, 5, 3) . '/' .
               substr($valor, 8, 4) . '-' .
               substr($valor, -2);
    }

}