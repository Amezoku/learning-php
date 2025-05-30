<?php echo '<pre>';

use App\ClassA;

require_once __DIR__ . '/../vendor/autoload.php';

$obj = new class(1, 2, 3) extends App\MyClass implements App\MyInterface {
    use App\MyTrait;
    public function __construct(public int $a, public int $b, public int $c)
    {
    }
};

var_dump($obj);
var_dump(get_class($obj));  // Выведет имя анонимного класса, назначенного движком, но использовать его не стоит

foo($obj);

function foo(\App\MyInterface $obj)     // Вместо этого можно использовать реализуемый анонимным классом интерфейс
{
    var_dump($obj);
}

// Анонимные классы могут находиться внутри обычных классов

$obj = new ClassA(1, 2);
var_dump($obj->bar());      // Вернет экземпляр анонимного класса

// Основное назначение анонимных функций это тестирование