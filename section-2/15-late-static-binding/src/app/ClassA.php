<?php

namespace App;

class ClassA
{
    protected string $name = 'A';
    protected static string $staticName = 'Static A';

    public function getName(): string
    {
        var_dump(get_class($this));
        return $this->name;
    }

    public static function getStaticName(): string
    {
//      // В статическом контексте вместо $this используется self, но из-за нее происходит раннее связывание
        var_dump(self::class);
        return self::$staticName;       // В дочернем классе вернется переменная родительского класса, что некорректно
    }

    public static function getLateStaticName(): string
    {
        return static::$staticName;     // Теперь в дочернем классе вернется его переменная
    }

    public static function make(): static   // С версии PHP 8 возвращаемым типом может быть static
    {
        return new static();    // Это полезно при создании нового экземпляра с помощью static
    }                           // Например, это используется в Factory Pattern
}