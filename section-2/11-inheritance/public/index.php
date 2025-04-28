<?php

use App\PaymentGateway\Paddle\Transaction;
use App\Toaster;
use App\ToasterPro;
use App\FancyOven;

require_once __DIR__ . '/../vendor/autoload.php';

$toaster = new Toaster();
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->toast();
echo '<br>';

$toasterPro = new ToasterPro();

$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->toast();
$toasterPro->toastBagel();
echo '<br>';


function foo(ToasterPro $toasterPro)    // Функция принимает только экземпляр дочернего класса ToasterPro
{
    $toasterPro->toast();
}

echo foo($toasterPro) . '<br>';


function foo2(Toaster $toaster)    // Функция принимает экземпляры родительского класса Toaster и его дочерних классов
{
    $toaster->toast();
    //$toaster->toastBagel();      // Вызов этого метода не сработает, так как он есть только в дочернем классе
}

echo foo2($toaster) . '<br>';
echo foo2($toasterPro) . '<br>';

$oven = new FancyOven($toasterPro);
$oven->toastBagel();