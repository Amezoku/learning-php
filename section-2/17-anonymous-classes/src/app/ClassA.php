<?php

namespace App;

class ClassA
{

    public function __construct(public int $x, public int $y)
    {
    }

    public function foo()
    {
        return 'foo';
    }

    public function bar(): object
    {
        return new class {
            public function __construct()
            {
            }

        };
    }
}