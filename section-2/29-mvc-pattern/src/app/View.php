<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        //include $this->view   // Это не сработает, потому что это относительный путь, а не полный

        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

//        foreach ($this->params as $key => $value) {
//            $$key = $value;
//        }

        // Функция extract() создаёт для каждого ключа массива переменную с этим именем и присваивает ей соответствующее значение
        extract($this->params);

        // Переменные переменных и extract() нужно использовать осторожно
        // Если мы передаем в них данные, предоставленные пользователем ($_GET), то он может получить доступ к данным
        // Достаточно добавить в адресной строке параметры запроса, например ?viewPath=../.env
        // Необходимо предпринимать меры предосторожности, например, с помощью валидации

        ob_start();

        include $viewPath;

//        $ob = ob_get_clean();
//        var_dump($ob);

        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}