<?php

declare(strict_types=1);

namespace PaymentGateway\Paddle;    // Пространство имен указывается после объявления строгой типизации

use Notification\Email;

class Transaction
{
    public string $description = 'Paddle';

    public function __construct()
    {
        var_dump(new CustomerProfile());        // Класс находится в том же пространстве имен и не требует импорта

        // Встроенный класс DateTime находится в глобальном пространстве, поэтому нужен "\" для избежания ошибки
        var_dump(new \DateTime());              // Также можно использовать use DateTime вместо слэша;

        // По умолчанию PHP попытается сложить пространство имен в PaymentGateway\Paddle\Notification\Email()
        //var_dump(new Notification\Email());

        // Обратный слэш перед именем начинает поиск с глобального пространства и находит Notification\Email()
        var_dump(new \Notification\Email());

        // С функциями иначе - если функция не найдена в локальном пространстве имен, то PHP будет искать в глобальном
        var_dump(explode(',', '1,2'));
    }
}

// Теперь будет использоваться функция из локального пространства имен, только если перед ней нет "\"
function explode($separator, $string)
{
    return 'Local explode';
}

// Явное указание глобального пространства у функций с помощью "\" может помочь немного ускорить программу