<?php


require_once 'src/bootstrap.php';

// Подключаем файл реализующий автозагрузку
require_once __DIR__ . '/../vendor/autoload.php';


// Запускаем приложение
try {
    SerogaGolub\System\App::run();
} catch (ErrorException $e) {
    redirect301("https://cv1.pikabu.ru/video/2020/09/06/159942443726964009_336x380.webm");//Error
}

