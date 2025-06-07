<?php

namespace App;

class UniqueInvoice
{
    private string $id;

    public function __construct()
    {
        $this->id = uniqid('invoice_');
    }

    public function __clone(): void
    {
        $this->id = uniqid('invoice_');
    }
}