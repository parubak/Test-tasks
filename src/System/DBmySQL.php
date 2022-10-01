<?php

namespace SerogaGolub\System;

use PDO;

class DBmySQL
{
    // Строка соединения с базой данных
    private $server = "mysql:host=mysql;dbname=db_comference_size";
    private $user = "root";
    private $pass = "test";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    protected $con;


    public function openConnection()
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);

            return $this->con;
        } catch (\PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
            return null;
        }
    }

    public function closeConnection()
    {
        $this->con = null;
    }

}