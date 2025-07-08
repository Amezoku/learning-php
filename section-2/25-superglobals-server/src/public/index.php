<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . '/../../vendor/autoload.php';

//echo '<pre>';
//print_r($_SERVER);
//echo '<pre>';

// Маршрутизация обычно настраивается с помощью библиотек или через фреймворк
// Ниже пример простого маршрутизатора, но такой способ не нужно использовать в продакшене

$router = new App\Router();

$router
    ->register('/', [\App\Classes\Home::class, 'index'])
    ->register('/invoices', [\App\Classes\Invoice::class, 'index'])
    ->register('/invoices/create', [\App\Classes\Invoice::class, 'create']);

//$router->register(
//    '/invoices',
//    function(){
//        echo 'Invoices';
//    }
//);

echo $router->resolve($_SERVER['REQUEST_URI']);