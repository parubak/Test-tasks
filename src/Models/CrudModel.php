<?php

namespace SerogaGolub\Models;

use SerogaGolub\System\DBmySQL;

class CrudModel
{
    public function readData()
    {
        try {
            $db = new DBmySQL();
            $conn = $db->openConnection();
            $sql = "SELECT id,Title,Date, Address, Map1,Map2,Country
                    FROM db_comference_size.conferences 
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

    public function edit($formArray)
    {
        return null;
    }
}