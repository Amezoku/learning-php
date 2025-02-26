<?php echo '<pre>';
// Документация по функциям файловой системы https://www.php.net/manual/en/ref.filesystem.php


echo 'scandir<br>';
// Функция scandir возвращает список файлов из указанной директории в виде массива. Их можно перебирать циклом

$dir = scandir(__DIR__);   // Магическая константа __DIR__ указывает на директорию текущего PHP файла
print_r($dir);                      // Точки в массиве это текущая (.) и родительская (..) директории


echo '<br>is_file & is_dir<br>';

var_dump(is_file($dir[2]));         // Проверяет, является ли элемент файлом
var_dump(is_dir($dir[1]));          // Проверяет, является ли элемент директорией


echo '<br>mkdir & rmdir<br>';
// Функция mkdir создает директорию, функция rmdir удаляет директорию

// Второй параметр mkdir определяет права доступа, третий параметр включает создание вложенных директорий
mkdir('files/abc', 0755, true);

rmdir('files/abc');   // Удалит директорию abc, только если она пустая. Директория files не удалится


echo '<br>file_exists, filesize & clearstatcache<br>';
// PHP кэширует возвращаемые значения некоторых функций, связанных с файлами
// Функция clearstatcache очищает кэш. Подробнее тут https://www.php.net/manual/en/function.clearstatcache.php

if (file_exists('files/file.txt')) {                  // Проверка на наличие файла с таким именем
    echo filesize('files/file.txt') . '<br>';         // Вывод размера файла в байтах - 0, файл пуст

    file_put_contents('files/file.txt', '123');  // Помещаем текст в файл
    echo filesize('files/file.txt') . '<br>';         // Вывод все равно 0, так как значение тянется из кэша

    clearstatcache();                                         // Очистка кэша состояния файлов
    echo filesize('files/file.txt') . '<br>';         // Теперь вернется актуальный размер файла

    file_put_contents('files/file.txt', '');     // Очистка содержимого файла
    clearstatcache();                                         // Повторный сброс кэша
} else {
    echo 'File not found';
}