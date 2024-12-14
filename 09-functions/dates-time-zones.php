<?php

$currentTime = time();
echo time() . '<br>';       // Отобразится метка времени Unix в секундах с момента января 1970 года

echo date('H:i:s d.m.Y') . '<br>';      // Отобразится текущая дата и время в указанном формате

$twoHoursLater = time() + 2 * 60 * 60;                          // Двигаем время на 2 часа вперед
echo date('H:i:s d.m.Y', $twoHoursLater) . '<br><br>';      // Отобразится дата и время на 2 часа позже

// Доступные форматы тут https://www.php.net/manual/en/datetime.format.php


// По умолчанию все функции даты и времени используют часовой пояс, указанный в php.ini, но это можно поменять

echo date_default_timezone_get() . '<br>';                  // Отобразится установленный часовой пояс

date_default_timezone_set('America/New_York');          // Установка другого часового пояса
echo date('H:i:s d.m.Y') . '<br><br>';

// Доступные часовые пояса тут https://www.php.net/manual/en/timezones.php
// В php.ini рекомендуется указывать зону UTC, а управлять часовыми поясами непосредственно в коде
// Про UTC тут https://ru.wikipedia.org/wiki/Coordinated_Universal_Time


// Функция mktime() позволяет получить временную метку Unix на основе переданных аргументов

$x = mktime(5,30,0,4,10,null);
echo date(' d.m.Y', $x) . '<br><br>';

// Функция strtotime() преобразует строковое представление даты в метку времени Unix

$y = strtotime('2024-12-20 07:20:45');
echo date('d/m/Y H:i:s', $y) . '<br>';
echo date('d/m/Y g:ia', strtotime('yesterday')) . '<br>';
echo date('d/m/Y g:ia', strtotime('last day of February 2024')) . '<br>';
echo date('d/m/Y g:ia', strtotime('second friday of January 2024')) . '<br><br>';

// Больше вариантов параметров тут https://www.php.net/manual/en/datetime.formats.php#datetime.formats.relative


// Парсинг даты с помощью date_parse

$date = date('Y-m-d H:i:s', strtotime('tomorrow 15:30:55'));
// Формат d/m/Y выдает ошибку, но Y-m-d или m/d/Y работают корректно

echo '<pre>';
print_r(date_parse($date));

print_r(date_parse_from_format('Y-m-d H:i:s', $date));

// https://www.php.net/manual/en/class.datetime.php