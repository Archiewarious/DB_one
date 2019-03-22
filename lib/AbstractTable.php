<?php

abstract class AbstractTable
{

    abstract protected function createTable();

    public function addItem($meta)
    {
        
        $table = $this->$table_info['table'];
        $sql = "INSERT INTO `$table` (";
        foreach ($table_info['columns'] as $column){
            $sql .= "`$column`,";
        }

        $sql .= ") VALUES (";
        foreach ($meta as $value){
            $sql .= "'$value',";
        }
        $sql .= ");";

        try {
            $res = $this->conn->exec($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    
        return $res;
    }
    
    public function fetchUsersItems($limit) {
        $sql = "SELECT * FROM `` ORDER BY `id` DESC LIMIT $limit;";
    
        $data = [];
    
        try {
            $res = $this->conn->query($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    
        foreach ($res as $item)
            $data[] = $item;
    
        return $data;
    }

    public function getItem($id) {
        $sql = "SELECT * FROM `` WHERE `id` = '{$id}';";
    
        try {
            $res = $this->conn->exec($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }

        return $res;
    }

    public function deleteItem($id) {
        $sql = "SELECT * FROM `users` WHERE `id` = '{$id}';";
    
        try {
            $res = $this->conn->query($sql);        
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    
        if (!$res){
            throw new \Exception("No item by {$id} was found");
        }
    
        $sql = "DELETE FROM `` WHERE id = '{$id}';";
    
        try {
            $res = $this->conn->exec($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    
        return true;
    }
}
