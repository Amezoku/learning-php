<?php

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        var_dump($_SESSION);

        return 'Invoices';
    }

    public function create(): string
    {
        return '<form action="/invoices/create" method="post">
                    <label>
                        Amount
                    </label><input type="text" name="amount" />
                </form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}