<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): View
    {
//        return (new View('index'))->render();

        return View::make('index', ['foo' => 'bar']);

//        return View::make('index', $_GET);

        // Переменные переменных и extract() нужно использовать осторожно
        // Если мы передаем в них данные, предоставленные пользователем ($_GET), то он может получить доступ к данным
        // Достаточно добавить в адресной строке параметры запроса, например ?viewPath=../.env
        // Необходимо предпринимать меры предосторожности, например, с помощью валидации
    }

    public function upload()
    {
        echo '<pre>';
        var_dump($_FILES);

        foreach ($_FILES['receipt']['name'] as $index => $name) {
            if (!empty($name)) {
                $tmpName = $_FILES['receipt']['tmp_name'][$index];
                $filePath = STORAGE_PATH . '/' . $name;
                move_uploaded_file($tmpName, $filePath);
                var_dump(pathinfo($filePath));
            }
        }

        if (!empty($_FILES['myimage']['name'])) {
            $tmpName = $_FILES['myimage']['tmp_name'];
            $filePath = STORAGE_PATH . '/' . $_FILES['myimage']['name'];
            move_uploaded_file($tmpName, $filePath);
            var_dump(pathinfo($filePath));
        }
    }
}