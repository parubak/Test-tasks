<?php

namespace SerogaGolub\System;

/**
 * Главный класс реализующий функционал отображения
 * представлений
 *
 * @author farza
 */
class View
{
    /**
     * @param string $path
     * @param array $data
     * @throws \ErrorException
     * @author farZa
     */
    public static function render(string $path, array $data = [])
    {
        echo "VVVViewVVVV";
        echo $path;
        echo "VVVVViewVVV";
        // Получаем путь, где лежат все представления
        $fullPath = __DIR__ . '/../Views/' . $path . '.php';

        // Если представление не было найдено, выбрасываем исключение
        if (!file_exists($fullPath)) {
            throw new \ErrorException('view cannot be found');
        }

        // Если данные были переданы, то из элементов массива
        // создаются переменные, которые будут доступны в представлении
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        // Отображаем представление
        include($fullPath);
    }
}