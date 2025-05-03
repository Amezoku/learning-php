<?php

namespace App;

class CollectionAgency implements DebtCollector, AnotherInterface   // Можно реализовать сразу несколько интерфейсов
{
    public const MY_CONSTANT = 2;
    public function __construct()
    {
    }

    public function collect(float $owedAmount): float   // Методы из интерфейса обязательно должны быть реализованы
    {
        $guaranteed = $owedAmount * 0.5;

        // Эта функция работает с целыми числами, поэтому при включенной строгой типизации возникла бы ошибка
        return mt_rand($guaranteed, $owedAmount);
    }

    public function foo()   // Реализуемые интерфейсы могут содержать одинаковые методы с одинаковой сигнатурой
    {
        // TODO: Implement foo() method.
    }

    public function baz()   // Все методы расширенных интерфейсов также должны быть реализованы
    {
        // TODO: Implement baz() method.
    }
}