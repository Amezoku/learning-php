<?php

declare(strict_types=1);

class Transaction
{
    private float $amount;
    private string $description;
    private $callback;

    public function __construct(
        float $amount,
        string $description,
        callable $callback,
    ) {
        $this->amount = $amount;
        $this->description = $description;
        $this->callback = $callback;
    }
}

// Продвижение свойств конструктора появилось в версии PHP 8.0. Оно позволяет сократить код
class shortTransaction
{
    private $callback;
    public function __construct(
        private float $amount,
        private string $description,
        callable $callback,             // В аргументе метода можно указать тип callable, в отличие от свойств класса
//        private callable $callback    // Но указание модификатора доступности для продвижения свойства вызовет ошибку
    ) {
        $this->callback = $callback;
    }
}

// Больше информации тут https://wiki.php.net/rfc/constructor_promotion