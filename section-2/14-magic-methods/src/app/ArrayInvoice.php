<?php

namespace App;

// Другой вариант использования со свойствами в массиве

class ArrayInvoice
{
    protected array $data = [];

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    // Метод __isset() вызывается, когда isset() или empty() применяется для недоступного свойства
    public function __isset(string $name): bool
    {
        var_dump('isset');
        return array_key_exists($name, $this->data);
    }

    // Метод __unset() вызывается, когда unset() применяется для недоступного свойства
    public function __unset(string $name): void
    {
        var_dump('unset');
        unset($this->data[$name]);
    }
}