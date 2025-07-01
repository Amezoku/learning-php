<?php echo '<pre>';

require_once __DIR__ . '/../../vendor/autoload.php';

// Сравнение дат

$dateTime1 = new DateTime('05/25/2025 9:15 AM');
$dateTime2 = new DateTime('06/20/2023 10:14 AM');

var_dump($dateTime1 < $dateTime2);
var_dump($dateTime1 > $dateTime2);
var_dump($dateTime1 == $dateTime2);
var_dump($dateTime1 <=> $dateTime2);

var_dump($dateTime1->diff($dateTime2));

// Метод diff() высчитывает разницу между объектами DateTime и возвращает объект DateInterval
// Свойство invert в возвращаемом объекте показывает направление разницы сравниваемых дат
// Значение 1 означает, что первая дата позже второй, и 0 означает, что первая дата раньше или равна второй
// При значении 1 будет вычитаться первая дата из второй, при значении 0 будет вычитаться вторая дата из первой

echo $dateTime1->diff($dateTime2)->invert . PHP_EOL;    // invert = 1, days = 704
echo $dateTime2->diff($dateTime1)->invert . PHP_EOL;    // invert = 0, days = 704
// Свойством invert можно управлять, меняя его значение для получения отрицательного интервала

echo $dateTime2->diff($dateTime1)->format('%d') . PHP_EOL;
echo $dateTime2->diff($dateTime1)->format('%Y years, %m months, %d days') . PHP_EOL;
echo $dateTime2->diff($dateTime1)->format('%H:%I:%S') . PHP_EOL;
echo $dateTime2->diff($dateTime1)->format('%a') . PHP_EOL;          // Общее количество дней
echo $dateTime2->diff($dateTime1)->format('%R%a') . PHP_EOL;        // Добавляет знак + или -
echo $dateTime1->diff($dateTime2)->format('%R%a') . PHP_EOL;

// Про DateInterval::format() - https://www.php.net/manual/en/dateinterval.format.php
// Про DateInterval::__construct - https://www.php.net/manual/en/dateinterval.construct.php

$interval = new DateInterval('P3M2D');              // Задаем интервал 3 месяца и 2 дня
var_dump($interval);

$dateTime = new DateTime('05/25/2025 9:15 AM');

$dateTime->add($interval);                                  // Заданный выше интервал можно использовать в вычислениях
echo $dateTime->format('d/m/Y g:i A') . PHP_EOL;

$dateTime->sub($interval);
echo $dateTime->format('d/m/Y g:i A') . PHP_EOL;

// Если переключить свойство invert с 0 на 1, то функция add() вычтет интервал, а sub() прибавит

$dateTime = new DateTime('05/25/2025 9:15 AM');

$interval->invert = 1;
$dateTime->add($interval);
echo $dateTime->format('d/m/Y g:i A') . PHP_EOL . PHP_EOL;

// Методы для работы с объектами DateTime напрямую вносят изменения в эти объекты

$from = new DateTime();
//$to = $from->add(new DateInterval('P1M'));    // Некорректный способ, так как изначальный объект также будет изменен
$to = (clone $from)->add(new DateInterval('P1M'));  // Корректный способ с клонированием объекта

var_dump($from, $to);
var_dump($from === $to);                    // С клонированием вернет false, а без клонирования true

echo $from->format('d/m/Y') . ' – ' . $to->format('d/m/Y') . PHP_EOL;

$from = new DateTimeImmutable();                    // Этот способ создаст объект, который нельзя изменить
$to = $from->add(new DateInterval('P1M'));  // Теперь это будет работать без clone

var_dump($from === $to);
echo $from->format('d/m/Y') . ' – ' . $to->format('d/m/Y') . PHP_EOL;

$to->add(new DateInterval('P1Y'));          // Объект типа DateTimeImmutable не получится изменить вот так
$to = $to->add(new DateInterval('P1Y'));    // Для изменения значения необходима переменная

echo $from->format('d/m/Y') . ' – ' . $to->format('d/m/Y') . PHP_EOL . PHP_EOL;

// DatePeriod class

$period = new DatePeriod(
    new DateTime('now'),
    new DateInterval('P1M'),
    (new DateTime('01.01.2026'))->modify('+1 day'),
    DatePeriod::EXCLUDE_START_DATE
);

foreach ($period as $date) {
    echo $date->format('d.m.Y') . PHP_EOL;
}   echo PHP_EOL;

$period = new DatePeriod(
    new DateTime('now'),
    new DateInterval('P1W'),
    5,
    DatePeriod::EXCLUDE_START_DATE
);

foreach ($period as $date) {
    echo $date->format('d.m.Y') . PHP_EOL;
}

// Carbon Library - https://carbon.nesbot.com/docs/
// Библиотека для работы с датами, которая используется в Laravel Framework и не только