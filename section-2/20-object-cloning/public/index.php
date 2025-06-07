<?php echo '<pre>';

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new \App\Invoice();

$invoice2 = new $invoice();

var_dump($invoice, $invoice2, \App\Invoice::create());  // Три способа создания объекта
echo PHP_EOL . PHP_EOL;

//$invoice3 = $invoice;         // Этот способ НЕ создаст копию объекта
$invoice3 = clone $invoice;     // Этот способ создаст копию объекта

// Видим одинаковые id у объектов, а false указывает, что это два разных объекта с одинаковыми id
var_dump($invoice, $invoice3, $invoice === $invoice3);
echo PHP_EOL . PHP_EOL;

// С помощью метода __clone() можно настроить поведение при клонировании объекта
$invoice = new \App\UniqueInvoice();
$invoice2 = clone $invoice;             // В этом случае при клонировании у копии объекта будет другой id

var_dump($invoice, $invoice2, $invoice === $invoice2);

// При клонировании объектов не вызывается метод __construct()