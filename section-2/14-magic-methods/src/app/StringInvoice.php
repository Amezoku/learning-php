<?php

namespace App;

class StringInvoice //implements \Stringable    // До версии PHP 8 требовалось явно реализовать встроенный интерфейс
{
    public function __toString(): string    // Вызывается при попытке взаимодействия с объектом как со строкой
    {
        return 'hello';     // Возврат других типов кроме строки сработает только при отключенном strict_types
    }
}