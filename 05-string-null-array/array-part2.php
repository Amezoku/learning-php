<?php
// Пример многомерного массива
$data = [
    "userInfo" => [
        "id" => 1,
        "name" => "John",
        "is_active" => true,
        "roles" => ["admin", "editor"]
    ],
    "productList" => [
        [
            "product_id" => 101,
            "name" => "Laptop",
            "price" => 1499.99,
            "in_stock" => 30
        ],
        [
            "product_id" => 102,
            "name" => "Phone",
            "price" => 799.50,
            "in_stock" => 100
        ]
    ],
    "userSettings" => [
        "theme" => "dark",
        "notifications" => false,
        "volume" => 75.5
    ]
];
echo '<pre>';
print_r($data);
echo '</pre>';

// Пример получения доступа к элементу многомерного массива
echo $data["productList"][0]["price"], '<br><br>1) ';

// При одинаковых ключах будет присвоено последнее значение 'baz', а элементов станет 2, а не 3
print_r($array1 = [0 => 'foo', 1 => 'bar', 1 => 'baz']);
echo '<br><br>2) ';

// PHP будет пытаться приводить типы ключей к int и array насколько это возможно. True станет 1, а 2.7 станет 2
print_r($array2 = [true => 'a', 1 => 'b', '2' => 'c', 2.7 => 'd']);
echo '<br><br>3) ';

// Ключ также может быть null. При этом [] будут пустыми. Доступ к элементу можно получить по null или ''
print_r($array3 = [null => 'n', 'a' => 'abc']);
echo '<br><br>', $array3[''], $array3[null], '<br><br>4) ';

// По умолчанию PHP присваивает значениям индексы. А так ведет себя PHP, если присвоить ключи не всем элементам:
print_r($array4 = ['asd' => 'a','b', 50 => 'c', 'd', 'qwe' => 'e', 'f']);
echo '<br><br>5) ';

print_r($array5 = [1, 50 => 2, 3, 'a' => 4, 5]);
echo '<br>', array_pop($array5), '<br>';    // Array_pop удаляет последний элемент массива
print_r($array5);
echo '<br>', array_shift($array5), '<br>';  // Array_shift удаляет первый элемент массива
// При этом произойдет переиндексация, в том числе ключа 50. Но на ключи типа string это не повлияет
print_r($array5);
echo '<br><br>6) ';

$array6 = [1, 2, 3, 4, 5];
print_r($array6);
echo '<br>';
unset($array6[2], $array6[0]);              // Еще один способ удалить элементы, но без переиндексации
print_r($array6);
//unset($array6);                           // Без указания ключа элемента удалится весь массив
echo '<br>';

// Если удалить все элементы в массиве, а затем поместить новый элемент, то индексация также не сбросится
unset($array6[1], $array6[3], $array6[4]);
$array6[] = 6;
print_r($array6);
echo '<br><br><pre>';

// Приведение переменной к типу array создаст массив и поместит в него значение переменной
var_dump($j = (array) 7);
var_dump($k = (array) 'a');
var_dump($l = (array) 8.9);
var_dump($m = (array) true);
var_dump($n = (array) null);    // Приведение null к array создаст пустой массив
echo '</pre>';

// Проверка существования ключа в массиве. В скобках через запятую указывается ключ и массив
var_dump(array_key_exists('0', $j));
var_dump(array_key_exists("name", $data["userInfo"]));  // Проверка существования ключа в многомерном массиве

// Нужно быть внимательнее при выборе способа проверки. Значения null могут приводить к багам, которые трудно найти
$o = ['key' => null];
var_dump(array_key_exists('key', $o));      // Этот способ вернет true, даже если значение null
var_dump(isset($o['key']));                     // Этот способ вернет false, если значение null