<?php

namespace SerogaGolub\System;

/**
 * Главный класс приложения
 */
class App
{
    /**
     * Запуск приложения
     * @throws \ErrorException
     */
    public static function run()
    {
        // контроллер и действие по умолчанию
        $controller = "home";
        $action = "main";


        // Получаем URL запроса
        $path = $_SERVER['REQUEST_URI'];

        // Разбиваем URL на части
        $pathParts = explode('/', $path);

        // получаем имя контроллера
        if (!empty($pathParts[1])) {
            $controller = $pathParts[1];
        }
        // получаем имя действия
        if (!empty($pathParts[2])) {
            $action = $pathParts[2];
        }

        // Формируем пространство имен для контроллера
        $controller = 'SerogaGolub\\Controllers\\' . $controller . 'Controller';
        // Формируем наименование действия
        $action = 'action' . ucfirst($action);

        // Если класса не существует, выбрасывем исключение
        if (!class_exists($controller)) {
            throw new \ErrorException('Controller does not exist');
        }

        // Создаем экземпляр класса контроллера
        $objController = new $controller;

        // Если действия у контроллера не существует, выбрасываем исключение
        if (!method_exists($objController, $action)) {
            throw new \ErrorException('action does not exist');
        }

        // Вызываем действие контроллера
        $objController->$action();
    }
}


