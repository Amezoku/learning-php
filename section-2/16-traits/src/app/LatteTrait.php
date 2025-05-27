<?php

namespace App;

trait LatteTrait
{
    private string $milkType = 'whole-milk';

    public static int $x = 1;
    public function makeLatte()
    {
        echo static::class . ' is making latte with ' . $this->milkType . PHP_EOL;
    }

    public static function foo()
    {
        echo 'Foo Bar' . PHP_EOL;
    }

    public function setMilkType(string $milkType): static
    {
        $this->milkType = 'whole-milk';

        return $this;
    }
}