<?php

// Конструкция switch по своему действию похожа на if else

$paymentStatus = 'paid';

switch ($paymentStatus) {
    case 'paid':
        echo 'Paid';
        break;                  // Как и в циклах, break прерывает выполнение кода, и другие кейсы не активируются

    case 'declined':            // Пример с отсутствием прерывания, когда нужен любой из нескольких вариантов
    case 'rejected':
        echo 'Declined';        // Код выполнится, если хотя бы один из статусов совпадет
        break;

    default:                    // Вариант default не является обязательным
        echo 'Unknown status';
}   echo '<br>';


// Switch выполняет нестрогое сравнение, а значит не проверяет типы данных

$k = '0';

switch ($k) {
    case 1:
        echo 'Yes';
        break;

    case 0:
        echo 'No';
        break;
}   echo '<br>';


// Оператор break прервет код внутри switch, но не в цикле

$l = ['a', 'b', 'c'];

foreach ($l as $m) {            // В данном случае код выполнится у всех кейсов
    switch ($m) {
        case 'a':
            echo 'A';
            break;
            //break 2;          // Чтобы выйти из цикла, нужно указать кол-во уровней в необязательном аргументе


        case 'b':
            echo 'B';
            break;
            //continue 2;       // В switch внутри цикла можно использовать continue вместо break

        default:
            echo 'C';
    }
    echo '<br>';                // Каждый кейс выполнится с новой строки, но только не в случае с continue
}   echo '<br>';


// Разница между switch и if else

function n()                    // Пример функции, чтобы показать разницу
{
    sleep(3);           // Функция ждет 3 секунды
    echo 'Done <br>';           // Выводит сообщение
    return 3;                   // Возвращает 3
}
// В случае if else придется ждать не 3, а 9 секунд, так как сперва проверяется каждое условие

// $n = n()                     Чтобы избежать этого, можно использовать переменную внутри конструкции вместо n()
if (n() === 1) {
    echo 1;
}   elseif (n() === 2) {
    echo 2;
}   elseif (n() === 3) {
    echo 3;
}   else {
    echo 4;
}   echo '<br><br>';

// В конструкции switch все проще - функция выполнится один раз и затем сравнит результат с условиями
switch (n()) {
    case 1:
        echo 1;
        break;
    case 2:
        echo 2;
        break;
    case 3:
        echo 3;
        break;
    default:
        echo 4;
}