<?php

namespace app\helpers;


class SanitizerHelper
{
    public static function string(?string $value): string
    {
        return trim(strip_tags($value ?? ''));
    }

    public static function int($value): int
    {
        return (int) $value;
    }

    public static function floatMoney(string $value): float
    {
        $value = str_replace(['R$', '.'], '', $value);
        $value = str_replace(',', '.', $value);

        return (float) trim($value);
    }

    public static function stringwithoutSpace(string $value): string
    {
        $value = trim($value);

        //Valores a serem substituidos
        $procurar   = ['ã', 'á', 'â', 'à', 'é', 'ê', 'í', 'ó', 'ô', 'ú', 'ç'];
        $substituir = ['a', 'a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'u', 'c'];

        $value = str_replace($procurar, $substituir, $value);
        $value = str_replace(' ', '_', $value);

        return strtolower($value);
    }

    public static function boolCheckbox($value): bool
    {
        return $value === 'on';
    }
}
