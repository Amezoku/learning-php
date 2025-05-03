<?php

namespace App;

interface DebtCollector extends SomeOtherInterface  // Интерфейсы также можно расширять с помощью extends
{
    public function __construct();
    public function collect(float $owedAmount): float;  // Интерфейсы могут иметь только public методы
    public function foo();

    //public int $x;                // Интерфейсы не могут иметь свойств
    public const MY_CONSTANT = 1;   // Интерфейсы могут иметь константы
                                    // В отличие от классов, константы интерфейсов нельзя переопределять
                                    // Начиная с версии PHP 8.1 константы интерфейсов можно переопределять
}