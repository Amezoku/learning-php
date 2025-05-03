<?php

namespace App;

class Rocky implements DebtCollector
{

    public function __construct()
    {
    }

    public function collect(float $owedAmount): float
    {
        return $owedAmount * 0.65;
    }

    public function foo()
    {
        // TODO: Implement foo() method.
    }

    public function baz()
    {
        // TODO: Implement baz() method.
    }
}