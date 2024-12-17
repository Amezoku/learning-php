<?php echo '<pre>';


echo 'fopen<br>';
// Функция fopen открывает файл или URL-адрес. Подробнее тут https://www.php.net/manual/en/function.fopen.php
// Открытие файла по URL не сработает, если удаленное открытие файлов отключено на сервере

$file2 = fopen('files/file2.txt', 'r');     // Открытие файла в режиме только для чтения (r)

// PHP открывает файл и возвращает ресурс типа stream. Вернет false и warning, если файл не удается открыть
// Этот ресурс представляет собой указатель на открытый файл, с помощью которого можно читать или изменять файл
var_dump($file2);

$file123 = @fopen('file123.txt', 'r');      // @ подавляет предупреждения, но это плохая практика
var_dump($file123);

if (! file_exists('files/file2.txt')) {           // Вместо @ лучше проверять наличие файла
    echo 'File not found';

    return;
}
$file2 = fopen('files/file2.txt', 'r');


echo '<br><br>fgets & fclose<br>';

while (($line = fgets($file2)) !== false) {         // Функция fgets построчно читает файл
    echo $line;                                     // Цикл вернет все строки из файла
}   echo '<br>';                                    // С помощью функции fwrite можно записать данные в файл

fclose($file2);                                     // Функция fclose закрывает файл
var_dump($file2);


echo '<br><br>fgetcsv<br>';

$file2 = fopen('files/file2.txt', 'r');

while (($line = fgetcsv($file2)) !== false) {       // fgetcsv читает файл как таблицу и возвращает массив
    print_r($line);                                 // Запятая по умолчанию читается как разделитель столбцов
}

fclose($file2);


echo '<br>file_get_contents<br>';
// Функция file_get_contents это еще один способ чтения содержимого файла

// Параметрами offset и length можно настроить смещение и длину отображаемого контента
$content = file_get_contents('files/file2.txt', offset: 11, length: 9);
echo $content . '<br>';


echo '<br>file_put_contents<br>';
// Функция file_put_contents записывает содержимое в файл. Делает то же, что и fopen, fwrite, fclose вместе

file_put_contents('files/file3.txt', 'Hi!');    // Если файла с таким именем нет, то он будет создан
echo file_get_contents('files/file3.txt') . '<br>';


file_put_contents('files/file3.txt', 'Hello');  // По умолчанию новые данные заменяют имеющиеся в файле
echo  file_get_contents('files/file3.txt') . '<br>';

// Если указан третий параметр FILE_APPEND, то новые данные будут добавлены к существующим
file_put_contents('files/file3.txt', ', Alex!', FILE_APPEND);
echo file_get_contents('files/file3.txt') . '<br>';


echo '<br>unlink, copy & rename<br>';

unlink('files/file3.txt');                           // Удаляет файл
var_dump(file_exists('files/file3.txt'));

copy('files/file2.txt', 'files/file3.txt');         // Копирует содержимое одного файла в другой
echo file_get_contents('files/file3.txt') . '<br>';

rename('files/file3.txt', 'files/file2.txt');       // Переименует файл
var_dump(file_exists('files/file3.txt'));


echo '<br>pathinfo<br>';
// Функция pathinfo возвращает массив с информацией о директории, имени и расширении файла

print_r(pathinfo('files/file2.txt'));