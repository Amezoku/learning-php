<?php

namespace App;

class CustomerInvoice
{
    public ?CustomerInvoice $linkedInvoice = null;

    public function __construct(public Customer $customer, public float $amount, public string $description)
    {
    }
}