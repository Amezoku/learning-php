<?php

declare(strict_types=1);

// Функция для добавления знака валюты к денежной сумме
function formatDollarAmount(float $amount): string
{
    $isNegative = $amount < 0;

    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2); // abs() вернет модуль числа
}


// Функция для форматирования даты
function formatDate(string $date): string
{
    return date('M j, Y', strtotime($date));
}