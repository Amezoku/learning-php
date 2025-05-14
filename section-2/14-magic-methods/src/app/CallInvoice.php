<?php

namespace App;

// Методы __call() и __callStatic() довольно мощные и используются в популярных фреймворках, например Laravel
// Они позволяют перехватывать вызовы несуществующих методов и перенаправлять их на другой метод или на другой объект
// Это удобно для реализации динамической логики, делегирования или паттернов вроде Прокси

class CallInvoice
{
    protected function process(float $amount, $description)
    {
        var_dump($amount, $description);
    }

    // Запускается при вызове недоступных методов
    public function __call(string $name, array $arguments)
    {
        // Проверка существования метода в текущем объекте. То же можно сделать и для __callStatic()
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
            // https://www.php.net/manual/ru/function.call-user-func-array.php
        }
        var_dump($name, $arguments);
    }

    // Запускается при вызове недоступных методов статически
    public static function __callStatic(string $name, array $arguments)
    {
        var_dump('static', $name, $arguments);
    }
}
// https://youtu.be/nCxnzj83poQ?si=IGnl4I6wGNonD7jU&t=465