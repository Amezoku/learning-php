<?php

use App\DebugInvoice;
use App\StringInvoice;

require_once __DIR__ . '/../vendor/autoload.php';
echo '<pre>';

// Магические методы это методы, которые перезаписывают стандартное поведение PHP во время какого-либо действия
// Имя таких методов начинается с двойного подчеркивания "__", и их можно переопределять

// Метод __get() вызывается каждый раз при попытке получить доступ к несуществующему или недоступному свойству объекта
// Метод __set() вызывается каждый раз при попытке присвоить значение несуществующему или недоступному свойству

$invoice = new App\Invoice();

$invoice->amount;       // По умолчанию выведет Warning, но после переопределения в классе Invoice вывод изменится
$invoice->amount = 15;  // Вызовет переопределенный метод __set()

$readonlyInvoice = new App\ReadonlyInvoice(50);

$readonlyInvoice->amount;
echo $readonlyInvoice->amount . PHP_EOL;    // Защищенное свойство в данном случае доступно для чтения
//$readonlyInvoice->amount = 75;            // Но оно недоступно для изменения, если не установлен метод __set()

$arrayInvoice = new App\ArrayInvoice();
$arrayInvoice->amount = 100;
var_dump($arrayInvoice);

var_dump(isset($arrayInvoice->amount));
unset($arrayInvoice->amount);
var_dump(isset($arrayInvoice->amount));

//App\ArrayInvoice::$amount;    // Методы __get(), __set(), __isset(), __unset() требуют объект и не работают статически
// Эти магические методы не могут заменить стандартные геттеры и сеттеры
// Магические методы полезны, когда нужна специальная обработка при доступе к неопределенным и недоступным свойствам

$callInvoice = new App\CallInvoice();
$callInvoice->process(200, 'Some Description');
App\CallInvoice::process(1, 2);

$stringInvoice = new App\StringInvoice();
echo $stringInvoice . '<br>';
var_dump($stringInvoice instanceof Stringable);     // Классы с __toString неявно реализуют интерфейс Stringable

$invokeInvoice = new App\InvokeInvoice();
$invokeInvoice();

$debugInvoice = new App\DebugInvoice();
var_dump($debugInvoice);