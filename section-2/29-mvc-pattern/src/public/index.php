<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$router = new App\Router();

$router
    ->get('/', [\App\Controllers\HomeController::class, 'index'])
    ->post('/upload', [\App\Controllers\HomeController::class, 'upload'])
    ->get('/invoices', [\App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [\App\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [\App\Controllers\InvoiceController::class, 'store']);

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);

// Код в данном проекте лишь демонстрирует работу MVC и не используется в продакшене
// В реальных проектах большая часть этой логики будет заменена с помощью фреймворков

// MVC (Model, View, Controller) - это паттерн, разделяющий данные и бизнес-логику от уровня представления
// Клиент отправляет на сервер запрос, проходящий через Controller, который находится между View и Model

// Задача контроллера - обрабатывать запросы, ответы, ресурсы и т.п., а также проводить валидацию форм (лучше в отдельном слое)
// Задача модели - обрабатывать бизнес-логику, управлять данными приложения (обработка, хранение в БД)

// Уровень представления (View) отображает информацию на клиенте (браузер, приложение)
// В большинстве случаев View это PHP-файлы, содержащие HTML или шаблонизатор (Twig, Blade)
// View также может быть создан с помощью фреймворков React или Vue.js (компоненты в виде файлов JavaScript)

// Эти три уровня взаимодействуют друг с другом, и схемы реализации взаимодействия MVC могут быть разными
// 1 вариант - модель взаимодействует с контроллером, но не с уровнем представления (см. Readme)
// 2 вариант - модель напрямую взаимодействует с уровнем представления вместо контроллера (см. Readme)
// Чаще всего используется первый вариант реализации

// MVC-паттерн необязательно создавать с нуля.
// В этом могут помочь фреймворки - Laravel, Symfony, Yii, CodeIgniter, CakePHP, Zend (Laminas)
// Реализация MVC в разных фреймворках может отличаться, но основная идея та же

// Каждый отдельный слой MVC может в свою очередь также разделен с использованием других паттернов в дополнение к MVC
// Например Database Abstraction