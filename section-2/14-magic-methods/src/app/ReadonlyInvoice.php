<?php

namespace App;

// ПРИМЕЧАНИЕ:
// Это не лучший способ использования данных методов, так как это нарушает инкапсуляцию
// Это лишь демонстрация возможностей языка

class ReadonlyInvoice
{
    protected float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    // Вариантом использования таких методов является предоставление доступа к закрытым свойствам только для чтения
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;    // Это даст некую работку ошибок, и вместо предупреждения вернется null
    }                   // Без метода __set() это и будет доступом только для чтения

//    public function __set(string $name, $value): void
//    {
//        if (property_exists($this, $name)) {
//            $this->$name = $value;
//        };
//    }
}