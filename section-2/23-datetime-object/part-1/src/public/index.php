<?php echo '<pre>';

require_once __DIR__ . '/../../vendor/autoload.php';

$dateTime = new DateTime('06/23/2025 3:30PM');

echo $dateTime->getTimezone()->getName() . ' – ' . $dateTime->format('m/d/Y g:i A') . PHP_EOL;

// List of Supported Timezones - https://www.php.net/manual/en/timezones.php

$dateTime
    ->setTimezone(new DateTimeZone('Europe/Amsterdam'))
    ->setDate(2025, 7, 21)
    ->setTime(2, 15);

echo $dateTime->getTimezone()->getName() . ' – ' . $dateTime->format('m/d/Y g:i A') . PHP_EOL;

$dateTime
    ->setDate(2025, 7, 21)
    ->setTime(2, 15)
    ->setTimezone(new DateTimeZone('America/New_York'));    // Часовой пояс скорректирует время

echo $dateTime->getTimezone()->getName() . ' – ' . $dateTime->format('m/d/Y g:i A') . PHP_EOL;


// Специфичные форматы объектов dateTime

//$date = '15/05/2025 3:30PM';      // Вызовет ошибку, так как '/' используется в американском формате M/D/Y
$date = '15.05.2025 3:30PM';        // Для европейского формата D.M.Y используются точки или дефисы
$date = '15-05-2025 3:30PM';
$dateTime = new DateTime($date);
var_dump($dateTime);

// Метод createFromFormat() сообщит PHP как правильно читать формат времени

$date = '15/05/2025 3:30PM';
$dateTime = DateTime::createFromFormat('d/m/Y g:iA', $date);
var_dump($dateTime);

// Если не указать время методу createFromFormat(), то он использует текущее время
// Если не указать время при создании объекта DateTime, то он использует 00:00:00

$date = '15/05/2025';
$dateTime = DateTime::createFromFormat('d/m/Y', $date);
var_dump($dateTime, new DateTime('15.05.2025'));

// Также можно указать нулевое время цепочкой методов с setTime()

$dateTime = DateTime::createFromFormat('d/m/Y', $date)->setTime(0, 0);
var_dump($dateTime);