<?php

use App\PaymentGateway\Paddle\Transaction;
use App\DB;

require_once __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction(25, 'Transaction 1');

var_dump($transaction::$count);         // Для доступа к статическим переменным нужно использовать "::"
var_dump(Transaction::$count);          // Статические переменные привязаны к классу, а не к его объектам

$transaction = new Transaction(25, 'Transaction 2');
var_dump(Transaction::$count);

$transaction = new Transaction(25, 'Transaction 3');
var_dump(Transaction::$count);

var_dump(Transaction::getCount2());     // Для доступа к private static переменной нужен static метод

//var_dump($transaction::$amount);      // С помощью "::" нельзя получить доступ к нестатическим свойствам и методам

// Обычно использование статических свойств и методов считается плохой практикой, но иногда они полезны
// Например - счетчик создания объектов или кэширование значений тяжелых функций (мемоизация)
// Также используется в паттерне Singleton (на примере класса DB)

$db = DB::getInstance([]);  // Будет создан только один экземпляр
$db = DB::getInstance([]);
$db = DB::getInstance([]);

//$db = new DB([]);         // Если сменить модификатор метода на public, то можно создать другие экземпляры
//$db = new DB([]);

// Вместо паттерна Singleton лучше использовать Dependency Injection (внедрение зависимостей)

// Еще один вариант использования static - это создание методов, которым не нужен экземпляр класса
// Например - форматирование валют, форматирование сумм
// Format::amount();

// Factory Method Pattern - еще один вариант использования статических методов
// Он отвечает за создание объектов других классов
// $transaction = TransactionFactory::make(25, 'Transaction 4');

// Но Dependency Injection все еще лучший способ по сравнению с Factory Method

// Использование static ускоряет программу, но в большинстве случаев эта микрооптимизация незначительна

// Доступ к статическим методам можно получить не статически, но это плохая практика
var_dump($transaction->getCount2());    // Так не видно, что этот метод статический, хотя он является таковым

// Также static могут быть callback и closure. Это делается, чтобы исключить доступ к $this
// Технически из callback можно изменить значение свойства, а static предотвращает это и помогает избежать багов
//$transaction->process();
var_dump($transaction->amount);