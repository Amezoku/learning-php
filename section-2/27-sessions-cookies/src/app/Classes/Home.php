<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

        setcookie(
            'userName',                 // Имя cookie
            'Nick',                     // Значение cookie
            time() + 10,                // Время действия cookie - 10 секунд
//          time() + (24 * 60 * 60),    // Время действия cookie - 1 день
        );                              // Cookies должны быть установлены перед любым выводом для избежания ошибок

        return 'Home';
    }
}