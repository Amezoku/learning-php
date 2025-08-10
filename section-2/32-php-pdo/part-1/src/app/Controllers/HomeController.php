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
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);

//            $email = $_GET['email'];
//            $query = 'SELECT * FROM users WHERE email = "' . $email . '"';
            // Этот запрос уязвим для SQL-инъекции http://localhost:8000/?email=foo@bar.com%22+OR+1=1--+

            $email = 'joan32213@doe.com';
            $name = 'Joan333 Doe2';
            $isActive = 1;
            $createdAt = date('Y-m-d H:m:i', strtotime('07/11/2024 9:00PM'));
            $updatedAt = date('Y-m-d H:m:i', strtotime('07/11/2024 11:00PM'));

            $query = 'INSERT INTO users (email, full_name, is_active, created_at, updated_at)
                      VALUES (:email, :name, :active, :date1, :date2)';

            $stmt = $db->prepare($query);

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindParam(':active', $isActive, PDO::PARAM_BOOL);
            $stmt->bindValue(':date1', $createdAt);
            $stmt->bindValue(':date2', $updatedAt);

            $isActive = 0;
            $name = 'foo bar';

            $stmt->execute(
//                [
//                    'email'     => $email,
//                    'name'      => $name,
//                    'active'    => $isActive,
//                    'date'      => $createdAt
//                ]
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