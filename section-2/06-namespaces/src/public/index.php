<?php

// При создании классов, функций или констант, по умолчанию они помещаются в глобальное пространство
// Это может привести к конфликту имен при наличии нескольких классов с одинаковым наименованием

require_once '../PaymentGateway/Stripe/Transaction.php';
require_once '../PaymentGateway/Paddle/Transaction.php';    // Ошибки нет, если классы в разных пространствах имен
require_once '../PaymentGateway/Paddle/CustomerProfile.php';
require_once '../Notification/Email.php';

$transaction = new PaymentGateway\Stripe\Transaction();     // Способ указания пространства имен класса
echo '<pre>';
echo $transaction->description . '<br>';

use PaymentGateway\Paddle\Transaction;                      // Также пространство имен можно указать с помощью use

$transaction = new Transaction();
echo $transaction->description . '<br>';

// Создание пространства имен также доступно для функций и констант, но это редко используется
//use function Example\Function;
//use const Example\Constant;

// Классам с одинаковым именем можно присвоить псевдонимы, чтобы использовать их в одном файле
// Также псевдонимы удобны для работы с длинными именами классов

use PaymentGateway\Stripe\Transaction as StripeTransaction;
var_dump($stripeTransaction = new StripeTransaction());
var_dump($paddleTransaction = new Transaction());

// Так можно импортировать сразу несколько классов из одного пространства имен
//use PaymentGateway\Paddle\{Transaction, CustomerProfile};

// Но если классов слишком много, то лучше использовать такой способ импорта
//use PaymentGateway\Stripe;
//$transaction = new Stripe\Transaction();

include('views/layout.php');    // Файл не унаследует импортированные классы. Нужно импортировать их внутри файла

// https://www.youtube.com/watch?v=Jni9c0-NjrY&list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-&index=38
// https://www.php.net/manual/en/language.namespaces.php
// https://www.php.net/manual/en/language.namespaces.rules.php
// https://www.php.net/manual/en/language.namespaces.faq.php
// https://www.php.net/manual/en/language.namespaces.definitionmultiple.php