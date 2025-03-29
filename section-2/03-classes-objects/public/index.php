<?php

declare(strict_types=1);

require_once '../Transaction.php';

$transaction = new Transaction(100, 'Transaction 1');

echo '<pre>';
print_r($transaction);
var_dump($transaction->getDescription());

$transaction->addTax(8);
$transaction->applyDiscount(10);

var_dump($transaction->getAmount());

// Так можно вызвать цепочку методов, если они возвращают $this, но в этом не всегда есть смысл
$amount = (new Transaction(200, 'Transaction 2'))
    ->addTax(12)
    ->applyDiscount(15)
    ->getAmount();

var_dump($amount);

$class = 'Transaction';     // Объект можно создать с помощью переменной
$transaction = (new $class(300, 'Transaction 3'));


// stdClass

$str = '{"a":1,"b":2,"c":3}';

$arr = json_decode($str, true);
print_r($arr);

$obj = json_decode($str);   // Если не указать true, то получим объект класса stdClass, а ключи станут свойствами
print_r($obj);
var_dump($obj->a);

$obj = new \stdClass();     // Создание объекта, используя stdClass
$obj->a = 10;               // Все свойства в stdClass являются public
$obj->b = 20;
print_r($obj);

$arr = ['a', 'b', 'c'];
$obj = (object)$arr;        // Приведение массива к типу object
print_r($obj);

// Свойства не могут начинаться с цифры, поэтому для доступа к ним нужно использовать {}, чтобы обойти это ограничение
var_dump($obj->{0});

print_r((object) 1);        // Объект получит свойство scalar со значением 1. Это работает с int, float, string и bool

print_r((object) null);     // В случае с null объект будет пустым


// Destructors
// См. https://www.youtube.com/watch?v=6FW72q5fIx8&t=880s&ab_channel=ProgramWithGio
