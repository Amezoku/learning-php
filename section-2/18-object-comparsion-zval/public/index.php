<?php echo '<pre>';

use App\CustomInvoice;
use App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice1 = new Invoice(1, 'My Invoice');
$invoice2 = new Invoice(true, 'My Invoice');

echo 'invoice1 == invoice2' . PHP_EOL;
var_dump($invoice1 == $invoice2);
// Вернет true, если объекты являются экземплярами одного класса, имеют одинаковые свойства и значения свойств
// Также тут выполняется нестрогое сравнение значений, так что без строгой типизации PHP будет приводить типы

echo 'invoice1 === invoice2' . PHP_EOL;
var_dump($invoice1 === $invoice2);
// Вернет true, если объекты указывают или ссылаются на один и тот же экземпляр одного и того же класса

$invoice3 = $invoice1;
// Вместо создания копии объекта, создается новый указатель на одну и ту же область памяти

echo 'invoice3 === invoice1' . PHP_EOL;
var_dump($invoice1 === $invoice3);      // В этом случае строгое сравнение вернет true
echo PHP_EOL;

// Zend value (zval) это внутренняя структура данных в движке PHP (Zend Engine) для хранения и управления переменными
// В zval способ хранения объектов отличается от способа хранения значений других простых типов
// Значения простых типов хранятся непосредственно в контейнере zval
// Но для объектов он хранит только id, который является указателем на конкретный объект в хранилище объектов

// На примере $obj2 = $obj1 происходит следующее:
// $obj2 копирует себе zval контейнер из $obj1 и теперь обе переменные ссылаются на один и тот же объект по его id
// По этой причине строгое сравнение возвращает true

$invoice3->amount = 250;            // Изменения свойства отразится и в $invoice1
var_dump($invoice1, $invoice3);

$invoice1 = new App\CustomerInvoice(new \App\Customer('Customer 1'), 25, 'My Invoice');
$invoice2 = new App\CustomerInvoice(new \App\Customer('Customer 2'), 25, 'My Invoice');

// Вложенные объекты также проверяются при сравнении

echo 'invoice1 == invoice2' . PHP_EOL;
var_dump($invoice1 == $invoice2);       // Вложенные объекты также учитываются при сравнении

echo 'invoice1 === invoice2' . PHP_EOL;
var_dump($invoice1 === $invoice2);

//$invoice1->linkedInvoice = $invoice2;
//$invoice2->linkedInvoice = $invoice1;
//var_dump($invoice1 == $invoice2);         // Циклические связи при сравнении приведут к ошибке

// При сравнении объектов также можно использовать знаки > и <