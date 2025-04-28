<?php

namespace app;

// Не следует использовать наследование по умолчанию в каждом случае. Иногда вместо него лучше использовать композицию
// Например тут. Печь с функцией тостера не является тостером, а значит не следует расширять класс тостера до печи

class FancyOven
{
    public function __construct(private ToasterPro $toaster)    // Использование зависимости с продвижением свойств
    {
    }

    public function fry()
    {
        // fry stuff
    }

    public function toast()
    {
        $this->toaster->toast();    // Композиция позволяет использовать методы из другого класса
    }

    public function toastBagel()
    {
        $this->toaster->toastBagel();
    }
}