<?php   // https://www.youtube.com/watch?v=rQntgj7yink

error_reporting(0);                     // Отключает вывод всех ошибок
error_reporting(E_ALL);                 // Включает вывод всех типов ошибок
error_reporting(E_ALL & ~E_WARNING);    // Включает вывод всех типов ошибок кроме предупреждений

// Список констант для настройки отслеживания ошибок тут https://www.php.net/manual/en/errorfunc.constants.php

//trigger_error('Example error', E_USER_ERROR);     // Можно вручную имитировать различные типы ошибок
echo 1 . '<br>';                                    // Если раскомментировать строку кода выше, то скрипт остановится

trigger_error('Example error', E_USER_WARNING);
echo 2 . '<br>';

// trigger error работает только с константами типа E_USER, использование других констант приведет к фатальной ошибке

// error_log() отправляет сообщение об ошибке заданному обработчику ошибок


// Пример кастомного обработчика ошибок
function errorHandler(
    int $type,
    string $msg,
    ?string $file = null,
    ?int $line = null
) {
    echo $type . ': ' . $msg . ' in ' . $file . ' on line ' . $line;

    exit;
}

set_error_handler('errorHandler', E_ALL);

// Документация https://www.php.net/manual/en/function.set-error-handler.php
// Это лишь демонстрация. На проекте вместо кастомных обработчиков лучше использовать встроенные механизмы PHP:
// error_log, настройки php.ini и исключения через try-catch