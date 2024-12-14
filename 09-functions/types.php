<?php

// ФУНКЦИИ ПЕРЕМЕННЫХ:

// Если к имени переменной присоединить круглые скобки, PHP ищет функцию с тем же именем, что и значение переменной

function bar($arg = '0')
{
    echo "Вызов bar() с аргументом $arg<br>";
}

$func = 'bar';
$func('test');                      // Вызывает функцию bar()

$x = 'baz';                         // Если функция с таким названием отсутствует, то это может привести к ошибке

        if (is_callable($x)) {      // Для избежания ошибки is_callable сперва проверит, можно ли вызвать функцию
    echo $x('test 2');
} else {
    echo 'Not Callable<br>';
}


// АНОНИМНЫЕ ФУНКЦИИ:
// Это функции без имени. Их также называют замыканиями (closures)
// С помощью use в анонимных функциях можно использовать переменные из родительской области видимости

$y = 'Result ';
$sum = function (...$numbers) use ($y) {
    echo $y;
    $y = 'abc';                     // Изменение переменной тут не повлияет на внешнюю переменную без use (&$y)
    return array_sum($numbers);
};                                  // Точка с запятой обязательна, так как анонимная функция считается выражением
echo $sum(1, 2, 3, 4);
echo '<br>' . $y;


// CALLBACKS (функции обратного вызова) / CALLABLES (сущности, вызываемые как функции):

// Callback функция передается другой функции в качестве аргумента, а затем вызывается внутри этой функции
// Callable это тип данных, которым может быть вызываемая функция

$array = [1, 2, 3, 4];

// array_map берёт каждый элемент массива $array и применяет к нему анонимную функцию
$arrayX2 = array_map(function ($x) {
    return $x * 2;                  // function ($x) {return $x * 2;} это и есть callable. Ее можно поместить в переменную
}, $array);                         // Структура array_map(функция, массив);

echo '<pre>';
print_r($array);
print_r($arrayX2);

// Второй способ с передачей функции с помощью переменной
$a = function ($x) {
    return $x * 3;
};

$arrayX3 = array_map($a, $array);
print_r($arrayX3);

// Третий способ с передачей функции через ее имя
function foo($x) {
    return $x * 4;
};

$arrayX4 = array_map('foo', $array);
print_r($arrayX4);


$sum2 = function (callable $callback, ...$numbers) {
    return $callback(array_sum($numbers));
};
echo $sum2('foo',100, 200, 50);

// Closure должно быть анонимной функцией, а callable может быть обычной функцией


// ARROW FUNCTIONS (стрелочные функции):
// Добавлены в PHP 7.4 и представляют собой более компактный синтаксис анонимной функции с некоторыми отличиями

$numbers = [1, 2, 3, 4];
$ten = 10;                  // Стрелочным функциям доступны переменные из родительской области без использования use
                            // Изменение этой переменной внутри функции не повлияет на ее внешний оригинал

$arrayX = array_map(fn($element) => $element * $element * $ten, $numbers);
echo '<pre>';
print_r($arrayX);

// На момент версии 8.4 стрелочные функции ограничены лишь одним выражением