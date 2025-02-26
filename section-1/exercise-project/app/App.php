<?php

declare(strict_types = 1);

// Функция для получения путей файлов с транзакциями
function getTransactionFiles(string $dirPath): array    // Директория будет передаваться через аргумент
{                                                       // Функцию можно использовать, даже если директория сменится
    $files = [];

    foreach(scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}

// Функция для извлечения информации из файлов
function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
    if (! file_exists($fileName)) {
        trigger_error('File not found: ' . $fileName, E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    fgetcsv($file);         // Вызов функции до цикла для пропуска первой строки с именами полей таблицы

    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    return $transactions;
}

// Функция для приведения денежных сумм к одному формату
function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];
}

// Функция для подсчета итоговой суммы
function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] > 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}