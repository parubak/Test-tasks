<?php
// Включаем режим строгой типизации
declare(strict_types=1);

// Подключаем файл реализующий автозагрузку
require_once __DIR__ . '/../vendor/autoload.php';



function dd($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

/**
 * @param string $path
 */
function redirect301(string $path) {
    header("HTTP/1.1 301 Moved Permanently");
    header(sprintf("Location: %s", $path));
    exit();
}



session_start();
// Запускаем приложение
SerogaGolub\System\App::run();
