<?php

namespace SerogaGolub\System;

use ErrorException;
use PDO;
use PDOException;

class DBmySQL
{
    // Строка соединения с базой данных
    private $server = "mysql:host=mysql;dbname=db_conference";
    private $user = "root";
    private $pass = "test";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    private $con;


    /**
     * @throws ErrorException
     */
    protected function openConnection(): PDO
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);

            return $this->con;
        } catch (PDOException $e) {
            throw new ErrorException("There is some problem in connection: " . $e->getMessage());
        }
    }

    protected function closeConnection()
    {
        $this->con = null;
    }

}