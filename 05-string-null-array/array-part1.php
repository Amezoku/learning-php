<?php

$fruit1 = 'apple';              // Вместо подобного нагромождения переменных лучше создавать массивы
$fruit2 = 'banana';
$fruit3 = 'orange';

$fruits = array('apple', 'banana', 'orange');   // Старый, но рабочий способ создать массив
$fruits = ['apple', 'banana', 'orange'];        // Новый и более предпочтительный способ создать массив

var_dump($fruits[0]);           // Данные извлекаются из массива с помощью индекса в [], который отсчитывается с 0
var_dump($fruits[-1]);          // Нельзя извлечь данные из конца массива с помощью отрицательного индекса
echo '<br>', $fruits[1];
echo '<br>';
var_dump(isset($fruits[3]));    // Проверка существования данных в массиве по его индексу. В этом случае false
echo '<br><br>';

$fruits[2] = 'mango';           // Можно присвоить элементу в массиве другое значение
var_dump($fruits);
echo '<br><br>';
print_r($fruits);               // Выводит менее подробную информацию о массиве в отличие от var_dump
echo '<br><br>';

echo '<pre>';                   // HTML-тег <pre> делает выводимую информацию более читабельной
print_r($fruits);
echo '</pre>';

echo count($fruits), '<br>';    // Вывод количества элементов в массиве с помощью count
$fruits[] = 'orange';           // Пустые [] добавляют новый элемент в конец массива
echo count($fruits);            // Теперь количество увеличилось на 1
echo '<pre>';
print_r($fruits);
echo '</pre>';

array_push($fruits, 'pear', 'kiwi');  // Добавление нескольких элементов с помощью array_push
echo '<pre>';
print_r($fruits);
echo '</pre>';

$fruits = [
     1 => 'apple',              // Можно заменить индексы на ключи. Ключ может быть int или string
    '2' => 'banana',
    'third' => 'orange',
];
$fruits['abc'] = 'mango';       // Добавление пары ключ-значение в конец массива
echo '<pre>';
print_r($fruits);
echo '</pre>';

$food = 'fruit';
$fruits[$food] = 'kiwi';        // Также ключ можно брать из переменной
echo '<pre>';
print_r($fruits);
echo '</pre>';