<?php

$isComplete = true;
$a = FALSE;                             // Значения bool нечувствительны к регистру
var_dump($isComplete, $a);
echo '<br>';

if ($isComplete)                        // Переменные bool в основном используются в управляющих конструкциях
{
    echo 'Success <br>';                // Поскольку значение true, выполнится именно это действие
}   else {
    echo 'Fail <br>';                   // Выполнится в случае, если значение переменной сменится на false
}

/* Конвертация других типов данных в bool происходит следующим образом:

    Нулевые int (0, -0) = false
    Нулевые float (0.0, -0.0) = false
    Нулевые string '0' = false.         Но string '-0' = true, так как знак минуса в строке это просто текст
    Пустые string '' = false.           Но string ' ' = true, так как пробел является символом
    Пустые array [] = false.            Но array [0] = true
    null = false
    Другие значения, в том числе негативные, конвертируются в true

*/

var_dump(is_bool($isComplete));         // Проверка является ли тип переменной bool
echo '<br>';
$b = 1;
var_dump(is_bool($b));