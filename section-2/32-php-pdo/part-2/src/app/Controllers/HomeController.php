<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
//        phpinfo();  // Тут можно проверить, включен ли PDO и какие драйверы БД доступны (строка PDO drivers)
//                    // Подключается через Dockerfile командой RUN docker-php-ext-install pdo pdo_mysql

        try {
            $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root', [
            ]);

//            $email = $_GET['email'];
//            $query = 'SELECT * FROM users WHERE email = "' . $email . '"';
            // Этот запрос уязвим для SQL-инъекции http://localhost:8000/?email=foo@bar.com%22+OR+1=1--+

            $email = 'jan@doe.com';
            $name = 'Jane Doe';
            $isActive = 1;
            $createdAt = date('Y-m-d H:m:i', strtotime('07/11/2024 9:00PM'));

            $query = 'INSERT INTO users (email, full_name, is_active, created_at)
                      VALUES (:email, :name, :active, :date)';
            $stmt = $db->prepare($query);

            $stmt->execute(
                [
                    'email'     => $email,
                    'name'      => $name,
                    'active'    => $isActive,
                    'date'      => $createdAt
                ]
            );

            $id = $db->lastInsertId();

            $user = $db->query('SELECT * FROM users WHERE id = ' . $id)->fetch();

            echo '<pre>';
            var_dump($user);
            echo '</pre>';

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

        return View::make('index');
    }
}