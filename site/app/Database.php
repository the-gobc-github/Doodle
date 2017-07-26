<?php

namespace App;

use \PDO;

class Database {

    private $db_name;
    private $db_user;
    private $pass;
    private $host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $pass = 'root', $host= 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->pass = $pass;
        $this->host = $host;

    }

    private function getPDO(){
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($query, $params = false)
    {
        if ($params)
        {
            $req = $this->getPDO()->prepare($query);
            $req->execute($params);
        }
        else
        {
            $datas = $this->getPDO()->query($query);
            $req = $datas->fetchAll(PDO::FETCH_OBJ);
        }
        return $req;
    }

    public function simple_query($query)
    {
        $req = $this->getPDO()->prepare($query);
        $req->execute();
        return $req;
    }

    public function lastInsertId()
    {
        return $this->getPDO()->lastInsertId();
    }
}

?>
