<?php

class DB 
{
    private $conn = null;

    function __construct()
    {
        require("config.php");


        $this -> connect($host, $user, $password);
        $this -> createDB($db);
        $this -> connect($host, $user, $password, $db);
    }

    private function connect($host, $user, $password, $db = NULL) {
        if (is_null($db)) {
            $dsn = "mysql:host=$host;charset=utf8;port=3306";
        } else {
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8;port=3306";
        }
    
        $this->conn = new \PDO($dsn, $user, $password);
        if (!$this->conn) {
            throw new \Exception('Unable to set db connection');
        }
    }

    private function createDB($dbname=''){
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname;";
    
        try {
            $res = $this->conn->exec($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    
        return $res;
    }

    public function getTable($name){
        return "table {$name}";
    }
    
}