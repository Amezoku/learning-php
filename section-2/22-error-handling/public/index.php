<?php

use App\Customer;
use App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new Invoice(new Customer());

//$invoice->process(25);
echo PHP_EOL;
//$invoice->process(-25);     // Выведет текст ошибки, который указан в методе process()

// Список встроенных исключений тут https://www.php.net/manual/en/spl.exceptions.php
// Если нет подходящего встроенного исключения, то можно создать свое

// Исключения можно перехватывать с помощью try catch

function process()
{
    $invoice = new Invoice(new Customer(['foo' => 'bar']));

    try {
        $invoice->process(-25);

        return true;
    } catch (\App\Exception\MissingBillingInfoException $e) {       // С 8 версии PHP переменная $e необязательна
        echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;

        return false;
    } catch (\InvalidArgumentException) {               // Блоков catch может быть несколько
        echo 'Invalid argument exception' . PHP_EOL;    // Из них сработает только один, который первым поймает ошибку

        return foo();
    } finally {                         // Этот блок позволяет выполнить код внутри него независимо от наличия ошибок
        echo 'Finally block' . PHP_EOL; // Если в блоках try или catch есть return, то он вернет значение после finally

        return -1;  // Если блок finally имеет return, то вернется только его значение вместо значений из try и catch
    }               // Но return из блока try catch все равно выполнится (пример - функция foo())
}

function foo()
{
    echo 'foo' . PHP_EOL;

    return false;
}

var_dump(process());

// Если try catch не перехватит исключения, то будет выполнен глобальный обработчик исключений
// Если глобальный обработчик исключений не установлен, то это приведет к фатальной ошибке

// Global exception handler (глобальный обработчик исключений)

set_exception_handler(function (\Throwable $e) {    // Throwable это базовый класс в иерархии исключений с PHP 7
    var_dump($e->getMessage());                     // https://www.php.net/manual/en/language.errors.php7.php
});

echo array_rand([], 1);

$invoice = new Invoice(new Customer());

$invoice->process(25);

// Подробнее тут: https://www.youtube.com/watch?v=XQ5Pd-6Hnjk