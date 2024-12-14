<?php

function mult(int $x, int|bool $y) {    // В круглых скобках определяем параметры функции. Также можно указать типы
    return $x * $y;
}
echo mult(5, 10) . '<br>';         // В круглых скобках передаем аргументы для параметров функции


function greet($guest = "guest") {      // Можно указать значение параметра по умолчанию, но только после обязательных
    echo "Hello, dear $guest!<br>";
}
greet();                                // Если аргумент не передан, то вернется значение по умолчанию
greet("Alex");

// По умолчанию аргументы передаются по значению. Про передачу по & (ссылке) ниже:
// https://youtu.be/I9XkWyets9w?si=sUUCpmivsSRaKlOL&t=181


function sum(...$numbers)               // Таким образом функции можно передавать переменное кол-во аргументов
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo sum(1000, 200, 50, 7);         // Перечисленные аргументы будут помещены в массив $numbers
echo '<br>';


function sum2(...$numbers)
{
    return array_sum($numbers);         // Встроенная функция для суммирования значений массива
}

echo sum2(3000, 500, 90, 2);
echo '<br>';

$numbers = ['a' => 5000, 'b' => 800];   // Ключи элементов массива воспринимаются функцией как имена аргументов
echo sum2(...$numbers) . '<br>';        // Так можно распаковать имеющийся массив и передать функции его аргументы


function devide($x, $y)
{
    return $x / $y;
}

$a = 6;
$b = 3;
echo devide($b, $a) . '<br>';           // По умолчанию параметры принимают аргументы в том порядке, в котором указаны
echo devide(y: $b, x: $a) . '<br>';     // Именование аргументов позволяет передавать их в другом порядке

// Именование аргументов позволяют проще работать с подобными функциями, имеющими множество параметров по умолчанию
setcookie(name: 'cookie', httponly: true);