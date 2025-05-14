<?php

namespace App;

class DebugInvoice
{
    // По умолчанию var_dump покажет свойства объекта, даже если они приватные
    private float $amount;
    private int $id = 1;
    private string $accountNumber = '01234567890';

    public function __debugInfo(): ?array   // Позволяет указать, какую конфиденциальную информацию вернет var_dump
    {                                       // Если указать [], то никакие свойства не отобразятся в var_dump
        return [
            'id' => $this->id,
            'accountNumber' => '****' . substr($this->accountNumber, -4),
        ];
    }
}

// Метод __debugInfo() используется не так уж часто