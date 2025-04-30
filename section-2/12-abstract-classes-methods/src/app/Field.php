<?php

namespace App;

abstract class Field
{
    public function __construct(protected string $name)
    {

    }

    abstract public function render(): string;  // Видимость абстрактных методов может быть только public или protected
}