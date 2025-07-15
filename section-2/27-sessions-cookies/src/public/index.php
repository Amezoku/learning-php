<?php echo '<pre>';

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();    // Независимо от настройки буферизации в конфигурации, лучше запускать сессию до любого вывода

$router = new App\Router();

$router
    ->get('/', [\App\Classes\Home::class, 'index'])
    ->get('/invoices', [\App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [\App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [\App\Classes\Invoice::class, 'store']);

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);

// Sessions и cookies используются для хранения информации между запросами
// Потому что HTTP это протокол без состояния (stateless)
// Cookies хранятся на стороне клиента, а sessions на стороне сервера
// По умолчанию sessions уничтожаются при закрытии браузера
// Cookies существуют до истечения срока или до их удаления


//phpinfo();  // output_buffering = 4096 байт (4 килобайт)

//echo 1;
//sleep(3);
//echo 2;

// Закрывающий PHP-тег не ставят, в том числе для избежания ошибок буферизации, если после тега есть символы

// Вместе с запуском сессии создается уникальный ID сессии, который записывается в cookies
// После этого cookies с ID сессии будет отправляться при каждом запросе (Devtools -> Application -> Cookies)
// В Devtools -> Network в каждом запросе во вкладке Cookies также можно будет увидеть этот ID

var_dump($_SESSION);    // Счетчик будет меняться при каждом обновлении страницы Home, что показывает работу сессии

// unset() удаляет указанный элемент из массива сессии, а сама сессия остается
// session_unset() очищает весь массив $_SESSION, но сессия не уничтожается
// session_destroy() уничтожает всю сессию: и данные, и сам сессионный файл на сервере


// COOKIES

// Cookies это файл, который хранится на стороне клиента
// Cookies используются для управления сеансами, отслеживания, целевой рекламы и улучшения пользовательского опыта
// Для создания используется метод setcookie()

var_dump($_COOKIE);

// Cookies удаляются путем изменения срока действия на дату в прошлом
// В cookies не следует хранить конфиденциальную информацию, потому что клиент легко получит к ней доступ