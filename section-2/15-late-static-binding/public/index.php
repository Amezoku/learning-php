<?php echo '<pre>';

require_once __DIR__ . '/../vendor/autoload.php';

// Позднее статическое связывание (Late Static Binding)
// https://www.php.net/manual/ru/language.oop5.late-static-bindings.php

// Связывание — это процесс, при котором программа определяет, к какому именно коду нужно обращаться
// Раннее связывание происходит во время компиляции, то есть до выполнения программы
// Позднее связывание происходит во время выполнения (Runtime)

$classA = new \App\ClassA();
$classB = new \App\ClassB();                    // ClassB() наследует родительский класс ClassA()

// Это позднее связывание, когда используется информация времени выполнения
echo $classA->getName() . PHP_EOL;              // $this ссылается на ClassA()
echo $classB->getName() . PHP_EOL;              // $this ссылается на ClassB()

// Вызов метода статически напрямую из класса
echo \App\ClassA::getStaticName() . PHP_EOL;    // В обоих случаях вернется A, хотя в случае с ClassB() ожидаем B
echo \App\ClassB::getStaticName() . PHP_EOL;    // Это и есть раннее статическое связывание

// Можно было бы решить эту проблему, перезаписав метод в дочернем классе, но это противоречит идее наследования
// Поэтому это некорректное поведение лучше решать с помощью позднего статического связывания

echo \App\ClassA::getLateStaticName() . PHP_EOL;    // В методе вместо return self используем return static
echo \App\ClassB::getLateStaticName() . PHP_EOL;    // Теперь возвращается корректное значение

print_r(\App\ClassA::make());
print_r(\App\ClassB::make());