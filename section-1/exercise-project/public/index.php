<?php
// https://www.youtube.com/watch?v=MOsolLaVnsI&ab_channel=ProgramWithGio

declare(strict_types = 1);

/* dirname() возвращает путь на 1 уровень выше. Вторым параметром кол-во уровней можно увеличить
 *
 * Пример:
 * __DIR__ вернет               "C:\Users\name\project\public"
 * dirname(__DIR__) вернет      "C:\Users\name\project"
 * dirname(__DIR__, 2) вернет   "C:\Users\name"
 */

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

// Объявление констант для пути к другим директориям
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require_once APP_PATH . 'App.php';
require_once APP_PATH . 'helpers.php';

$files = getTransactionFiles(FILES_PATH);

$transactions = [];                 // Создание пустого массива
foreach ($files as $file) {         // Цикл для добавления новых транзакций к массиву

    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

$totals = calculateTotals($transactions);

require_once VIEWS_PATH . 'transactions.php';
