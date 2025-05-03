<?php

namespace App;

class DebtCollectionService
{
    // Тут мы слишком конкретны в реализации. Метод принимает только аргумент типа конкретного класса
    //public function collectDebt(CollectionAgency $collector)

    // Интерфейс решает эту проблему. Теперь метод будет работать со всеми классами, реализующими данный интерфейс
    // Это и называется полиморфизмом. Объект полиморфный, если он может принимать множество форм
    public function collectDebt(DebtCollector $collector)       // Указываем интерфейс в качестве типа аргумента
    {
        var_dump($collector instanceof Rocky);              // Теперь объект может быть экземпляром этого класса
        var_dump($collector instanceof CollectionAgency);   // И также может быть экземпляром другого класса

        $owedAmount = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($owedAmount);

        echo 'Collected $' . $collectedAmount . ' out of $' . $owedAmount . PHP_EOL;
    }
}