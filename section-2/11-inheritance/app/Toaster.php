<?php

namespace app;

// final class Toaster      // Добавление final перед именем класса не позволит наследовать иго
class Toaster               // Добавление final перед именем метода позволит его наследовать, но не переопределять
{
    protected array $slices;
    protected int $size;

    public function __construct()
    {
        $this->slices = [];
        $this->size = 2;
    }

    public function addSlice(string $slice): void
    {
        if (count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    // В целом наследование это хорошо, но при неправильном или слишком частом использовании оно может мешать
    // Например, наследование может нарушить инкапсуляцию, так как оно имеет доступ к public и protected свойствам и пр.
    // Также от родительского класса может наследоваться много свойств и методов, которые даже не будут использоваться

    public function foo()   // Этот метод можно вызвать из дочернего класса, даже если он там не нужен
    {

    }

    public function toast()
    {
        foreach ($this->slices as $i=>$slice) {
            echo ($i + 1) . ': Toasting ' . $slice . '<br>';
        }
    }
}