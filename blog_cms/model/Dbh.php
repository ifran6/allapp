<?php

class Dbh{
    private $host = "localhost";
    private $dbname = "elite_db";
    private $dbusername = "root";
    private $dbpassword = "";

    protected function connect(){
        try {
            $pdo = new PDO("mysql:host=".$this->host."; dbname=".$this->dbhname, $this->dbusername, $tis->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDO_Exception $e) {
            die("Connection Failed:" .$e->getMessage());
        }
    }
}