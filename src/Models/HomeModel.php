<?php

namespace SerogaGolub\Models;

use SerogaGolub\Controllers\HomeController;
use SerogaGolub\System\DBmySQL;

class HomeModel extends DBmySQL
{
    /**
     * @throws \ErrorException
     */
    public function readData(): ?array
    {
        try {

            $conn = $this->openConnection();
            $sql = "SELECT *
                    FROM conferences 
                    ORDER BY id DESC";
            $res = $conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
            $this->closeConnection();
        } catch (\PDOException $e) {
            $this->closeConnection();
            throw new \ErrorException( "There is some problem in connection: " . $e->getMessage());
        }

        return $res;
    }
}