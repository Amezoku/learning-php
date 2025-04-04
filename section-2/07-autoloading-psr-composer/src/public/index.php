<?php

// Кастомная функция автозагрузки выглядит так, но вместо нее мы будем использовать Composer

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . (str_replace('\\', '/', $class)) . '.php';
//
//    if (file_exists($path)) {
//        require $path;
//    };
//});

// PHP Standard Recommendations https://www.php-fig.org/psr/
// Если в PHP Storm настроен Code Style PSR-12, то его можно применить с Ctrl+Alt+L

// За автозагрузку отвечает PSR-4 https://www.php-fig.org/psr/psr-4/

// Composer можно установить с помощью Docker (см. https://youtu.be/rqzYdHdyMH0?si=u7JgwqVP_czlR8tL&t=627)
// Наиболее часто используемые команды в Composer это require, install, update & remove

// Пакеты для проектов можно найти на https://packagist.org/ или в документации используемой библиотеки

require __DIR__ . '/../vendor/autoload.php';    // Подключаем файл автозагрузки Composer

$id = new \Ramsey\Uuid\UuidFactory();           // Теперь можно использовать классы из загруженных пакетов
echo $id->uuid4();

// Автозагрузка по умолчанию не видит наши классы из директории "app". Нужно добавить ее в "composer.json"
// Также нужно заново сгенерировать файл "autoload_psr4.php" с помощью команды "composer dump-autoload"

use App\PaymentGateway\Paddle\Transaction;
$paddleTransaction = new Transaction();
var_dump($paddleTransaction);                   // Теперь наши классы тоже автоматически загружаются

// Команда "composer dump-autoload" используется только во время разработки
// В продакшене следует использовать команду "composer dump-autoload -o" для оптимизированной автозагрузки