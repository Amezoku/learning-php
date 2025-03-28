<?php

$x = 5;                 // Переменные, объявленные таким образом, находятся в глобальной области видимости
include('file.php');    // Переменная будет доступна в файлах, подключенных после ее объявления

function xyz($x) {
    echo $x . '<br>';   // Функции имеют обособленную область видимости. Объявленная выше $x здесь не видна
    $y = 10;            // Также объявленная внутри функции переменная не будет видна за пределами этой функции
    echo $y;
}
xyz($x);                // Значение переменной передается в функцию извне в виде аргумента для ее параметра
echo $y . '<br>';


function abc() {
    global $x;                  // Так можно получить доступ к глобальной переменной
    echo $x . '<br>';
    echo $GLOBALS['x'] = 123;   // PHP хранит глобальные переменные в суперглобальном массиве $GLOBALS
}
abc();
echo $x . '<br>';
// ! Глобальных переменных и $GLOBALS следует избегать. Это снижает читаемость кода и повышает вероятность багов



function getValue() {
    static $value = null;       // Статические переменные не уничтожаются за пределами области видимости

    if ($value === null) {
        $value = someVeryExpensiveFuncton();
    }

    // Some processing with $value

    return $value;
}

function someVeryExpensiveFuncton() {
    sleep(2);
    echo 'Processing';          // Processing отобразится 1 раз, если переменная static, а без static 3 раза
    return 10;
}

echo getValue() . '<br>';       // Предположим, что функция вызвана 3 раза из разных мест в коде
echo getValue() . '<br>';
echo getValue() . '<br>';
// Статические переменные позволяют кэшировать подобные вещи
// Подробнее тут https://youtu.be/et1aVZWMvVE?si=gWPS6pcafGtu0EbD&t=193