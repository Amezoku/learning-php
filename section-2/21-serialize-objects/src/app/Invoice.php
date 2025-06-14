<?php

namespace App;

class Invoice
{
    private string $id;
    protected string $name = '';
    public string $email = '';

    public function __construct()
    {
        $this->id = uniqid('invoice_');
    }

    public static function create(): static
    {
        return new static();
    }
}