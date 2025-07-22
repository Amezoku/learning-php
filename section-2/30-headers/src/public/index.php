<?php

use App\View;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

try {
    $router = new App\Router();

    $router
        ->get('/', [\App\Controllers\HomeController::class, 'index'])
        ->get('/download', [\App\Controllers\HomeController::class, 'download'])
        ->post('/upload', [\App\Controllers\HomeController::class, 'upload'])
        ->get('/invoices', [\App\Controllers\InvoiceController::class, 'index'])
        ->get('/invoices/create', [\App\Controllers\InvoiceController::class, 'create'])
        ->post('/invoices/create', [\App\Controllers\InvoiceController::class, 'store']);

    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );
} catch (\App\Exceptions\RouteNotFoundException $e) {
//    header('HTTP/1.1 404 Not Found');
    http_response_code(404);    // Заголовки должны быть отправлены до отправки любых выходных данных

    echo View::make('error/404');
}

// Данный проект лишь демонстрирует работу с запросами, ответами, отправкой заголовков и т.д.
// На реальных проектах для этого будут использоваться готовые пакеты и компоненты, которые выполняют эту работу лучше