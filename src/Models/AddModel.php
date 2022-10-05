<?php

namespace SerogaGolub\Models;

use SerogaGolub\System\DBmySQL;

class AddModel extends DBmySQL
{

    public function addData(array $arr)
    {
        $db = new DBmySQL();
        $conn = $db->openConnection();
        $stmt = $conn->prepare("INSERT INTO conferences 
                (title, data,map_lat,map_lng,country) 
        VALUES (:title, :inputDate,:lat,:lng,:country)");

        $stmt->bindParam(':title', $arr["title"]);
        $stmt->bindParam(':inputDate', $arr["inputDate"]);
        $stmt->bindParam(':country', $arr["country"]);
        $stmt->bindParam(':lat', $arr["lat"]);
        $stmt->bindParam(':lng', $arr["lng"]);
        $stmt->execute();

        return true;

//        try {
//            $db = new DBmySQL();
//            $conn = $db->openConnection();
//            $sql = "SELECT id,Title,Date, Address, Map1,Map2,Country
//                    FROM db_comference_size.conferences
//                    ORDER BY id DESC";
//            $res = $conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
//            $db->closeConnection();
//        } catch (\PDOException $e) {
//            echo "There is some problem in connection: " . $e->getMessage();
//            return null;
//        }
//        if (!empty($res)) {
//
//            return $res;
//        }
//
    }
}