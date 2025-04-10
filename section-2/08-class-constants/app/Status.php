<?php

namespace App;

class Status        // Выносим константы в отдельный класс
{
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined',
    ];
}