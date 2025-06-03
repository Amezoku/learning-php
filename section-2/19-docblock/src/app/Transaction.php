<?php

namespace App;

/**
 * @property-read int $x
 * @property-write float $y
 * @property string $z
 *
 * @method static int bar(string $x)
 */
class Transaction
{
    public function __get(string $name)
    {
        // TODO: Implement __get() method.
    }

    public function __set(string $name, $value): void
    {
        // TODO: Implement __set() method.
    }

    /** @var Customer */
    private Customer $customer;     // До версии PHP 7.4 нельзя было указать тип, поэтому использовался DocBlock

    /** @var float */
    private float $amount;

    /**
     * Some description
     *
     * @param Customer $customer
     * @param float|int $amount
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     *
     * @return bool
     */
    public function process(Customer $customer, float|int $amount): bool    // Docblock делает то же самое
    {
        // process transaction

        // if failed, return false

        // otherwise return true
        return true;
    }

    /**
     * @param Customer[] $arr
     */
    public function foo(array $arr)
    {
        //** @var Customer $obj */
        foreach ($arr as $obj) {
            $obj->name;
        }
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement __call() method.
    }

    public static function __callStatic(string $name, array $arguments)
    {
        // TODO: Implement __callStatic() method.
    }
}