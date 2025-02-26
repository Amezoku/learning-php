<?php

// MATCH

$payStatus = 1;

switch ($payStatus) {                       // Пример switch для сравнения с match
    case 1:
        echo 'Paid'; echo '!';              // В switch можно выполнить несколько выражений в одном кейсе через ;
        break;

    case 2:
    case 3:
        echo 'Declined';
        break;

    default:
        echo 'Unknown status';
}   echo '<br>';


match ($payStatus) {                        // Match появилась в версии PHP 8. Она похожа на switch с рядом отличий
    1 => print 'Paid', '!',                 // В match нельзя выполнить несколько выражений. Выполнится только первое
//  '1' => print 'Paid',                    // Match в отличие от switch выполняет строгое сравнение типов
    2,3 => print  'Declined',               // В match нет break. Для проброса кейсы перечислены через запятую
    default => print 'Unknown status',      // В match отсутствие default приведет к ошибке, если ни один кейс не подходит
};
echo '<br>';


$payStatusDisplay = match ($payStatus) {    // Конструкция match может быть присвоена переменной
    1 => 'Paid',                            // В этом случае print заменяем на echo после фигурных скобок
    2,3 => 'Declined',                      // На месте ключа или значения может быть функция, выражение, условие и т.д.
    default => 'Unknown status',
};
echo $payStatusDisplay . '<br>';


// RETURN

function sum($o, $p) {
    return $o + $p;                         // return завершает выполнение функции и возвращает результат
}

$q = sum(5, 10);
echo $q . '<br>';

return;                                     // Использование return вне функции прервет выполнение кода ниже

echo 'Bye!';

