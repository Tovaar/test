<?php
/**
 * Created by PhpStorm.
 * User: Sander
 * Date: 29-1-2019
 * Time: 18:54
 */

class inc extends Dbc
{

    public function run($sql)
    {
        $stmt = $this->connect()->prepare($sql);
        return $stmt;
    }

    public function getQuery()
    {
        $stmt = $this->run("SELECT * FROM ahliweatherdb.users");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;

        }
        return $rows;



    }

    public function getUser($id)
    {
        $rows = [];
        $preparedId = $id;
        $stmt = $this->run("SELECT * FROM ahliweatherdb.users WHERE idUsers= :id ");
        $stmt->execute(array('id'=> $id));

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;

        }
        return $rows;
    }
}
