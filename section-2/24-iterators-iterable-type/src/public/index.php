<?php

use App\Invoice;
use App\InvoiceCollection;
use App\InvoiceCollection2;

echo '<pre>';
require_once __DIR__ . '/../../vendor/autoload.php';

//foreach (new App\Invoice(25) as $key => $value) {
//    echo $key . ' = ' . $value . PHP_EOL;           // Итератор отобразит все видимые свойства объекта
//}

$invoiceCollection = new InvoiceCollection([new Invoice(15), new Invoice(25), new Invoice(50)]);

foreach ($invoiceCollection as $invoice) {
    echo $invoice->id . ' – ' . $invoice->amount . PHP_EOL;
}   echo PHP_EOL;

// Использование пользовательских итераторов для простых массивов может быть излишним
// Список встроенных итераторов - https://www.php.net/manual/en/spl.iterators.php

$invoiceCollection2 = new InvoiceCollection2([new Invoice(77), new Invoice(88), new Invoice(99)]);

foreach ($invoiceCollection2 as $invoice) {
    echo $invoice->id . ' – ' . $invoice->amount . PHP_EOL;
}   echo PHP_EOL;

function foo(\App\Collection|array $iterable)       // С версии PHP 8 можно перечислять типы через "|"
{
    foreach ($iterable as $item) {
        // ...
    }
}

function bar(iterable $iterable)                    // С версии 7.1 можно использовать тип iterable
{
    foreach ($iterable as $i => $item) {
        echo $i . PHP_EOL;
    }
}

bar($invoiceCollection2);
bar(['a', 'b', 'c']);

// Итераторы позволяют "лениво" обходить данные, загружая элементы по мере необходимости, и экономить память