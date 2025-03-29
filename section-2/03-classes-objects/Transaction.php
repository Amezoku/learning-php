<?php

declare(strict_types=1);

class Transaction
{
    private float $amount;           // В версии PHP 7.4 появилась возможность указывать тип у свойств класса
    private string $description;

    // Метод __construct() будет вызываться каждый раз при создании нового объекта
    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;            // Переменная $this ссылается на объект, из которого вызван этот метод
        $this->description = $description;
    }

    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;

        return $this;
    }

    public function getAmount(): float      // Метод-getter для получения доступа к private свойству
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
