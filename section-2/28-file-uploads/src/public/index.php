<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage/');

$router = new App\Router();

$router
    ->get('/', [\App\Classes\Home::class, 'index'])
    ->post('/upload', [\App\Classes\Home::class, 'upload'])
    ->get('/invoices', [\App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [\App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [\App\Classes\Invoice::class, 'store']);

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);

// В php.ini в директиве file_uploads можно отключить загрузку файлов

// Директива upload_max_filesize регулирует максимальный размер файла
// Также в коде желательно сделать дополнительную валидацию

// Директива max_file_uploads регулирует максимальное кол-во файлов за один запрос

// Директива max_input_time задает макс. время, в течение которого PHP может парсить входящий запрос (в т.ч. с файлом)
// Это максимальное количество секунд, сколько PHP готов ждать, пока все данные дойдут