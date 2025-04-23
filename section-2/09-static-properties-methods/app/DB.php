<?php

namespace App;

class DB
{
    private static ?DB $instance = null;                     // Экземпляр статического свойства

    private function __construct(public array $config)      // Модификатор конструктора private
    {                                                       // Напрямую создать экземпляр класса нельзя
        echo 'Instance Created<br>';
    }

    public static function getInstance(array $config): DB   // Экземпляр класса создается с помощью этого метода
    {
        if (self::$instance === null) {
            self::$instance = new DB($config);
        }

        return self::$instance;
    }
}