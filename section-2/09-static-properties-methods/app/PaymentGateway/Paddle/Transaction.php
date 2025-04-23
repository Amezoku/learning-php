<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction
{
    public static int $count = 0;       // Статическое свойство класса
    private static int $count2 = 10;

    public function __construct(
        public float $amount,
        public string $description,
    ) {
        self::$count++;                 // Переменная увеличится на единицу при каждом создании объекта
        self::$count2++;
    }

    public static function getCount2(): int
    {
        //echo $this->amount;           // Переменная $this недоступна внутри статического метода
        return self::$count2;
    }

    public function process()
    {
        array_map(static function () {  // Использование static предотвратит изменение свойства
            $this->amount = 35;         // Значение не будет изменено на 35
        }, [1]);

        echo 'Processing paddle transaction...';
    }
}