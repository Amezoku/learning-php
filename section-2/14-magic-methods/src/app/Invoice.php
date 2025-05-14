<?php

namespace App;

class Invoice
{
    //public float $amount;     // Наличие public переменной $amount не вызвало бы методы __get() и __set()
    protected float $amount;

    public function __get(string $name)
    {
        var_dump($name);
    }

    public function __set(string $name, $value): void
    {
        var_dump($name, $value);
    }
}