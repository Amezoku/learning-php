<?php echo '<pre>';

require_once __DIR__ . '/../vendor/autoload.php';

// Сериализация это преобразование значения в строковую форму
// В PHP можно сериализовать почти любой тип данных, включая объекты
// Нельзя сериализовать resource, closures и некоторые встроенные объекты PHP

echo serialize(true) . PHP_EOL;
echo serialize(1) . PHP_EOL;
echo serialize(2.5) . PHP_EOL;
echo serialize('hello') . PHP_EOL;
echo serialize([1, 2, 3]) . PHP_EOL;
echo serialize(['a' => 1, 'b' => 2]) . PHP_EOL . PHP_EOL;

var_dump(unserialize(serialize(true)));
var_dump(unserialize(serialize('hello')));
var_dump(unserialize(serialize(['a' => 1, 'b' => 2])));

// Сериализация полезна для передачи значений PHP или сохранения их для использования в базе данных
// При сериализации объекта сериализуются его свойства, значения и имя класса, но не сериализуются методы

// Private свойства получают префикс в виде имени класса, protected префикс "*", public без префикса
$invoice = new \App\Invoice();
echo $str = serialize($invoice) . PHP_EOL . PHP_EOL;

// При десериализации создается новый объект
$invoice2 = unserialize($str);
var_dump($invoice, $invoice2, $invoice === $invoice2);
echo '<br>';

// При десериализации выполняется глубокое копирование объекта
// Глубокое копирование значит, что при восстановлении объекта из сериализованной формы создаётся новая копия объекта,
// включая все вложенные объекты, а не просто ссылки на них

// В функцию serialize() следует передавать только надежные данные, чтобы избежать возникновения уязвимостей в коде

// Функция вернет false, если ей не удастся десериализовать данные
var_dump(unserialize('O:11:"App\Invoice":1:{s:2:"id";s:21:"invoice_123";}'));

// В этом случае false вернется и в случае корректного, и в случае некорректного выполнения десериализации
$str = serialize(false);
var_dump(unserialize($str));
// Можно избежать путаницы, добавив обработку ошибок

$invoice = new \App\SerializableInvoice(25, 'Invoice 1', '1234123412341234');
$str = serialize($invoice);
echo $str . PHP_EOL . PHP_EOL;      // Пример с __serialize()

$invoice2 = unserialize($str);
var_dump($invoice2);                // Пример с __unserialize()