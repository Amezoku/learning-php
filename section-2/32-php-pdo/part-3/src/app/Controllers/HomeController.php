<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Models\Invoice;
use App\Models\User;
use App\Models\SignUp;
use App\View;
use PDO;

class HomeController
{
    public function index(): View
    {
        $email = 'job12123dfn@doe.com';
        $name = 'Jon Dow';
        $amount = 256;

        $userModel      = new User();
        $invoiceModel   = new Invoice();
        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name,
            ],
            [
                'amount' => $amount,
            ]);

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }
}