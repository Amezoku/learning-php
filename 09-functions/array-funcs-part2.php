<?php echo '<pre>';

echo 'array_merge<br>';
// Функция array_merge объединяет несколько массивов
// Структура array_merge(array ...$arrays): array

$array1 = [1, 2 => 2, 3 => 3];              // Числовые ключи будут переиндексированы
$array2 = ['a' => 4, 'b' => 5, 'c' => 6];   // Строковые ключи останутся после слияния
$array3 = [7, 8, 'b' => 9];                 // Повторяющийся ключ перезапишет более ранний и заменит его

$merged = array_merge($array1, $array2, $array3);
print_r($merged);


echo '<br>array_reduce<br>';
// Функция array_reduce итеративно сокращает массив до единственного значения
// Структура - array_reduce(array $array, callable $callback, mixed $initialValue = null): mixed

$invoices = [
    ['name' => 'Item 1', 'qty' => 1, 'price' => 100],
    ['name' => 'Item 2', 'qty' => 2, 'price' => 200],
    ['name' => 'Item 3', 'qty' => 3, 'price' => 150],
    ['name' => 'Item 4', 'qty' => 4, 'price' => 50],
];

// В callback первым аргументом передается результат предыдущей итерации, а вторым значение текущей итерации
// По умолчанию начальное значение это null, но его можно установить третьим аргументом после callback

$total = array_reduce($invoices, fn($sum, $item) => $sum + $item['qty'] * $item['price']);
print_r($total);


echo '<br><br>array_search<br>';
// Функция array_search возвращает ключ искомого значения
// Структура - array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false

$array = ['a', 'B', 'b', 'c', 'D', 'E', 'ab', 'cd', 'b', 'd'];

$key = array_search('b', $array);     // Поиск чувствителен к регистру. Вернет false, если совпадений нет
var_dump($key);                             // Вернет ключ только первого найденного значения, если есть дубли


echo '<br>in_array<br>';
// Функция in_array вернет true в случае совпадения и false в случае, если значение не найдено
var_dump(in_array('D', $array));


echo '<br>array_diff<br>';
// Функции array_diff сравнивают первый массив с остальными и возвращает уникальные элементы первого массива
// array_diff сравнивает только значения
// array_diff_assoc сравнивает и ключи и значения
// array_diff_key сравнивает только ключи

$a = ['a' => 5, 'b' => 10, 'c' => 15, 'd' => 1000];
$b = ['e' => 5, 'f' => 12, 'c' => 15, 'd' => 1400];

print_r(array_diff($a, $b));        // Вернет элементы массива $a, значения которых отсутствуют в $b
print_r(array_diff_assoc($a, $b));  // Вернет элементы массива $a, где ключи или значения не совпадают с $b
print_r(array_diff_key($a, $b));    // Вернет элементы массива $a, ключи которых отсутствуют в $b


echo '<br>asort & ksort<br>';
// Функция asort сортирует массив по значениям, ksort сортирует массив по ключам

$array4 = ['d' => 3, 'b' => 1, 'c' => 4, 'e' => 4, 'a' => 5];

asort($array4);
print_r($array4);

print_r(ksort($array4));    // Сами по себе эти функции возвращают только bool, а не массив
print_r($array4);


echo '<br>usort<br>';
// Функция usort кастомно сортирует массив по значениям. Эта функция переиндексирует массив

// Значения массива сравниваются попарно и с помощью <=> функция перемещает их от меньшего к большему
usort($array4, fn($a, $b) => $a <=> $b);
print_r($array4);

// Если поменять местами $a и $b, то сортировка будет большего к меньшему
usort($array4, fn($a, $b) => $b <=> $a);
print_r($array4);


echo '<br>list<br>';
// Конструкция list раскладывает элементы массива на переменные

$array5 = [10, 20, 30, [40, 50]];

list($a, $b, $c) = $array5;             // Такой вариант конструкции не поддерживает вложенные массивы
echo "$a, $b, $c<br>";

[$a, $b, $c, [$d, $e]] = $array5;       // Вариант той же конструкции с поддержкой вложенных массивов
echo "$a, $b, $c, $d, $e<br>";

[1 => $a, 0 => $b, 2 => $c] = $array5;  // Также можно указать конкретные ключи присваиваемых значений
echo "$a, $b, $c<br>";