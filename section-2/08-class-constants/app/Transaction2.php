<?php

declare(strict_types=1);

namespace App;

class Transaction2
{
    private string $status = 'pending';     // Значение по умолчанию можно установить тут или в конструкторе

    public function __construct()
    {
        $this->setStatus('pending');    // Значение по умолчание в конструкторе
    }

    public function setStatus(string $status): self     // Вместо имени класса можно использовать self
    {
        $this->status = $status;

        return $this;
    }
}