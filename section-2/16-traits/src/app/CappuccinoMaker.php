<?php

namespace App;

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait;

    public function makeCappuccino()    // Переопределенный метод в классе имеет больший приоритет
    {
        echo static::class . ' is making cappuccino (UPDATED)' . PHP_EOL;
    }
}