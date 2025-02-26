<?php

$b = null;                      // Константа null. Null это отсутствие значения
$c = NULL;                      // Null нечувствителен к регистру
echo $b, $c, '<br>';            // Echo преобразует данные в строку, поэтому в случае null никакие данные не отобразятся
var_dump($b, $c);
echo '<br><br>';

var_dump(is_null($b));          // Проверка на null
var_dump($c === null);    // Еще один способ проверки на null
var_dump($d === null);    // Неопределенная переменная также станет null
echo '<br><br>';

var_dump($e = 123);
unset($e);                      // Unset удаляет переменную. До unset $e = 123, после unset $e = null
var_dump($e);
echo '<br><br>';

var_dump($f = (string)null);    // Так null конвертируется в другие типы
var_dump($g = (int)null);
var_dump($h = (bool)null);
var_dump($i = (array)null);

// Примеры использования null:
// Инициализация переменной без значения, а затем присвоение значения в управляющих конструкциях
// Передача null в базу данных, если значение не присвоено