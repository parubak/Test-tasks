<?php

namespace SerogaGolub\Models;

use SerogaGolub\Controllers\HomeController;
use SerogaGolub\System\DBmySQL;

class HomeModel
{
    public function readData(): ?array
    {
        try {
            $db = new DBmySQL();
            $conn = $db->openConnection();
            $sql = "SELECT id,title,data, map_lat, map_lng,country
                    FROM db_conference.conferences 
                    ORDER BY id DESC";
            $res = $conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
            $db->closeConnection();
        } catch (\PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
            return null;
        }
        if (!empty($res)) {

            return $res;
        }


        return null;
    }
}