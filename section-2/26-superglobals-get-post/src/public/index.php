<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . '/../../vendor/autoload.php';

$router = new App\Router();

$router
    ->get('/', [\App\Classes\Home::class, 'index'])
    ->get('/invoices', [\App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [\App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [\App\Classes\Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

// Такой способ также не используется в реальных проектах. Это лишь демонстрация работы роутера