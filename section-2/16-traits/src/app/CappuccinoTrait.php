<?php

namespace App;

trait CappuccinoTrait
{
    public function makeCappuccino()
    {
        echo static::class . ' is making cappuccino' . PHP_EOL;
    }

    public function makeLatte()
    {
        echo static::class . ' is making latte (Cappuccino trait)' . PHP_EOL;
    }
}