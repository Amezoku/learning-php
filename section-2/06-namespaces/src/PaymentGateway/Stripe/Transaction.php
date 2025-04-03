<?php

declare(strict_types=1);

namespace PaymentGateway\Stripe;    // Принято именовать пространство структурой папок

// Если в классе нужно использовать другой класс с таким же именем, ему необходимо присвоить псевдоним
use PaymentGateway\Paddle\Transaction as VendorTransaction;

class Transaction
{
    public string $description = 'Stripe';
}