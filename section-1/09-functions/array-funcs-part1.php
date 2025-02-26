<?php echo '<pre>';

// PHP имеет множество встроенных функций для работы с массивами. В этом уроке будут рассмотрены некоторые из них
// Полный список таких функций тут https://www.php.net/manual/en/ref.array.php


echo 'array_chunk<br>';
// Функция array_chunk разбивает массив на куски
// Структура - array_chunk(array $array, int $length, bool $preserveKeys = false): array

$items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

print_r(array_chunk($items, 2));    // Массив разделится на куски по 2 элемента без сохранения ключей
print_r(array_chunk($items, 3, true));    // По 3 элемента с сохранением ключей


echo '<br>array_combine<br>';
// Функция array_combine соединяет два массива в один, создавая из них пары ключ-значение
// При несоответствии кол-ва элементов в этих массивах выдаст ошибку в версиях PHP 8 и выше
// До 8 версии PHP выдавал предупреждение и функция возвращала false
// Структура - array_combine(array $keys, array $values): array

$array1 = ['a', 'b', 'c'];
$array2 = [5, 10, 15];
print_r(array_combine($array1, $array2));


echo '<br>array_filter<br>';
// Функция array_filter фильтрует элементы массива с помощью callback
// Структура - array_filter(array $array, callable|null $callback = null, int $mode = 0): array

$array3 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

$even = array_filter($array3, fn($value) => $value % 2 === 0);  // Оставляем только четные числа
print_r($even);                                                 // По умолчанию фильтруется только значение

// Можно указать ARRAY_FILTER_USE_KEY или ARRAY_FILTER_USE_BOTH для фильтра по ключу или по ключу со значением
$xyz = array_filter($array3, fn($value, $key) => $value < 5 && $key !== 'b', ARRAY_FILTER_USE_BOTH);

$xyz = array_values($even);        // После фильтрации массив следует реиндексировать с помощью array_values
print_r($xyz);

// Если не указать callback, то функция вернет все, что не может быть false
$array4 = [0, false, 1, 0.0, '0', 10, [], 100];
print_r($true = array_filter($array4));


echo '<br>array_values & array_keys<br>';
// Функция array_values заново проиндексирует и вернет значения массива как в примере выше
// Функция array_keys также проиндексирует массив с 0, а ключи этого массива станут значениями
// Доп аргументами в array_keys можно передать конкретное искомое значение, а также включить строгое сравнение
print_r(array_keys($array3, 1, true));


echo '<br>array_map<br>';
// Функция array_map применяет callback к каждому элементу массива
// Структура - array_map(callable|null $callback, array $array, array ...$arrays): array

$abc = ['a' => 1, 'b' => 2, 'c' => 3];
$defg = ['d' => 4, 'e' => 5, 'f' => 6, 'g' => 7];

// При передаче одного массива ключи сохранятся
print_r(array_map(fn($value) => $value * 2, $abc));

// При передаче более одного массива итоговый массив будет переиндексирован
// При передаче массивов разной длины, к короткому массиву добавятся недостающие элементы со значением 0
print_r(array_map(fn($value1, $value2) => $value1 * $value2, $abc, $defg));

// Если callback = null, то это создаст новые массивы из элементов по порядку, а на месте недостающих будет null
print_r(array_map(null, $abc, $defg));