<?php

declare(strict_types=1);

namespace App;

class Transaction3
{
    private string $status;

    public function __construct()
    {
        $this->status = Status::PENDING;
    }

    public function setStatus(string $status): self
    {
        if (! isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid status: ' . $status);
        }

        $this->status = $status;

        return $this;       // Чтобы вызывать цепочку методов, нужно возвращать текущий объект
    }                       // В методе getStatus() мы вернули бы $status
}