<?php

namespace SerogaGolub\Models;
use PDOStatement;
use SerogaGolub\System\DBmySQL;

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
     * @return false|PDOStatement
     * @author farZa
     */
    public function displayAll()
    {
        // Строка соединения с базой данных
        $dsn = new DBmySQL();
        // Создаем экземпляр класса для работы с БД
//        $pdo = (new DBmySQL())->openConnection();

        // SQL запрос на получение всех новостей
        $sql = 'SELECT * FROM conferences';

        // Возвращаем полученные из БД данные
//        return $pdo->query($sql);
    }
}