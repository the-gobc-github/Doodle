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
						try {
							$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //use utf8 encoding
							$pdo = new PDO('mysql:dbname=doodle_db;host=localhost', 'root', 'root',$arrExtraParam);
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$this->pdo = $pdo;
						}
						catch(PDOException $e) { //error gestion
								$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
								die($msg);
						}
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
						// FETCH_OBJ get the columns names of $datas ?
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
