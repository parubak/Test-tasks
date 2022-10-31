<?php

namespace SerogaGolub\Models;

use ErrorException;
use SerogaGolub\System\DBmySQL;

class ConferenceModel extends DBmySQL
{

    /**
     * @throws ErrorException
     */
    public function addData(array $arr): bool
    {
        try {
            $conn = $this->openConnection();
            $sql = $conn->prepare(
                "INSERT INTO conferences 
                (title, data,map_lat,map_lng,country) 
        VALUES (:title, :inputDate,:lat,:lng,:country)"
            );
            $this->createParameters($sql, $arr);
            $sql->execute();
            $this->closeConnection();
        } catch (ErrorException $e) {
            $this->closeConnection();
            throw new ErrorException("There is some problem in connection: " . $e->getMessage());
        }

        return true;
    }

    /**
     * @throws ErrorException
     */
    public function deleteById(int $id): bool
    {
        try {
            $conn = $this->openConnection();

            $sql = $conn->prepare(
                "delete from conferences
                where id=:id;"
            );
            $sql->bindParam(':id', $id);


            $sql->execute();
            $this->closeConnection();
        } catch (ErrorException $e) {
            $this->closeConnection();
            throw new ErrorException("There is some problem in connection: " . $e->getMessage());
        }

        return true;
    }


    /**
     * @throws ErrorException
     */
    public function selectById(int $id)
    {
        try {
            $conn = $this->openConnection();

            $sql = $conn->prepare(
                "select *
                from conferences
                where id=:id;"
            );
            $sql->bindParam(":id", $id);
            $sql->execute();
            $res = $sql->fetchAll(\PDO::FETCH_ASSOC);
            $this->closeConnection();
        } catch (ErrorException $e) {
            $this->closeConnection();
            throw new ErrorException("There is some problem in connection: " . $e->getMessage());
        }
        return $res;
    }

    /**
     * @throws ErrorException
     */
    public function updateData(array $arr)
    {
        try {
            $conn = $this->openConnection();
            $sql = $conn->prepare(
                "UPDATE conferences SET
                title = :title,
                data = :inputDate,
                map_lat = :lat ,
                map_lng = :lng ,
                country = :country 
                WHERE id = :id ;"
            );
            $sql->bindParam(':id', $arr["id"]);
            $this->createParameters($sql, $arr);

            $sql->execute();
            $this->closeConnection();
        } catch (ErrorException $e) {
            $this->closeConnection();
            throw new ErrorException("There is some problem in connection: " . $e->getMessage());
        }
    }

    /**
     * @param $sql
     * @param array $arr
     */
    public function createParameters($sql, array $arr): void
    {
        $sql->bindParam(':title', $arr["title"]);
        $sql->bindParam(':inputDate', $arr["inputDate"]);
        $sql->bindParam(':country', $arr["country"]);
        $sql->bindParam(':lat', $arr["lat"]);
        $sql->bindParam(':lng', $arr["lng"]);
    }


}