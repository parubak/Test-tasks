<?php

namespace SerogaGolub\System;

use ErrorException;

/**
 * Главный класс реализующий функционал отображения
 * представлений
 *
 */
class View
{
    private $viewsPath = __DIR__ . '/../Views/';
    private $layoutsPath = __DIR__ . '/../Views/layouts/';

    /**
     * @throws ErrorException
     */
    public function loadView(string $viewName, array $arrayData = [])
    {
        $path = $this->viewsPath . $viewName . '.php';

        ob_start();
        $this->render($path, $arrayData);
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * @throws ErrorException
     */
    public function renderLayout(string $layoutsName, array $arrayData = [])
    {
        $layoutsFile = $this->layoutsPath . $layoutsName . '.php';
        $this->render($layoutsFile, $arrayData);
    }

    /**
     * @throws ErrorException
     */
    protected function render(string $path, array $arrayData = [])
    {
        // Если представление не было найдено, выбрасываем исключение
        if (!file_exists($path)) {
            throw new ErrorException('view template cannot be found');
        }

        // Если данные были переданы, то из элементов массива
        // создаются переменные, которые будут доступны в представлении
        if (!empty($arrayData)) {
            foreach ($arrayData as $key => $value) {
                $$key = $value;
            }
        }
        // Отображаем представление
        require($path);
    }
}