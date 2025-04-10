<?php

declare(strict_types=1);

namespace App;

class Transaction
{
    public const STATUS_PAID = 'paid';
    private const STATUS_PENDING = 'pending';
    public const STATUS_DECLINED = 'declined';

    public function __construct()
    {
        var_dump(Transaction::STATUS_PENDING);      // Константы private доступны внутри класса
        var_dump(self::STATUS_PENDING);             // Также можно использовать self
    }
}