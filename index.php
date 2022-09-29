<?php
// Включаем режим строгой типизации
declare(strict_types=1);

// Подключаем файл реализующий автозагрузку
require_once __DIR__ . '/vendor/autoload.php';;

// Запускаем приложение
SerogaGolub\System\App::run();