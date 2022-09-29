<?php

namespace SerogaGolub\Models;
use PDO;

/**
 * Модель "Новости" содержащая бизнес логику
 * относящуюся к сущности "Новости"
 *
 * @author farza
 */
class News
{
    /**
     * Метод, отвечающий за получение всех данных
     * о новостях портала
     *
     * @return array
     * @author farZa
     */
    public function displayAll()
    {
        // Строка соединения с базой данных
        $dsn = 'mysql:host=mysql;dbname=db_comference_size;';
        // Создаем экземпляр класса для работы с БД
        $pdo = new PDO($dsn, 'root', 'test');

        // SQL запрос на получение всех новостей
        $sql = 'SELECT * FROM conferences';

        // Возвращаем полученные из БД данные
        return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}