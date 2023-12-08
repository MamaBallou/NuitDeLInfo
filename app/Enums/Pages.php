<?php

namespace App\Enums;
use ReflectionClass;

class Pages {
    public const accueil = 'Accueil';
    public const actualites = 'Actualités';
    public const quizz = 'Quizz';
    public const escape_game = 'Escape game';

    public static function names() {
        $rc = new ReflectionClass(__CLASS__);
        return $rc->getConstants();
    }

    public static function values() {
        return array_values(self::names());
    }

    public static function options() {
        $names = self::names();
        $values = self::values();

        return array_combine($values, $names);
    }
}