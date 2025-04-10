<?php

use app\Status;
use app\Transaction;
use app\Transaction2;
use app\Transaction3;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction();

echo Transaction::STATUS_PAID;              // С помощью оператора "::" получаем доступ к константам класса
echo $transaction::STATUS_PAID;             // Так же можно получить доступ через объект
echo '<br>';

echo Transaction::class . '<br>';           // Возвращает имя класса вида Foo\Bar
echo $transaction::class . '<br><br>';

$transaction = new Transaction2();
$transaction->setStatus('paid');        // Изменения статуса оплаты
var_dump($transaction);

$transaction->setStatus('dfbdhe');      // Проблема в том, что можно передать некорректное значение
var_dump($transaction);

$transaction = new Transaction3();
$transaction->setStatus(Status::PAID);  // Теперь в классе Status перечислены все возможные статусы
var_dump($transaction);

// В версии PHP 8.1 добавлена поддержка enum классов