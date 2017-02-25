<?php

/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/01/17
 * Time: 15:54
 */
class Class_bdmysqli
{
    private $conn;
    private $time_start;
    private $time_end;
    public function getTime(){
        return round(($this->time_end - $this->time_start),5);
    }
    public function __construct(){
        $this->conn = new mysqli("127.0.0.1","root","1234","charlaphp");
    }
    public function flushCache(){
        $sql = "RESET QUERY CACHE;";
        $connection = $this->conn;
        $query = $connection->query($sql);
    }
    public function insert($values){
        $this->time_start = microtime(true);
        $this->flushCache();
        $sql = " INSERT INTO `beers` (`id`, `name`, `country`) ".
               " VALUES (NULL, '".$values["cerveza"]."', '".$values["pais"]."');";
        $connection = $this->conn;
        $connection->set_charset("UTF-8");
        $query = $connection->query($sql);
        $this->time_end = microtime(true);
        echo "Insert in : ".$this->getTime();
    }
    public function select(){
        $this->time_start  = microtime(true);
        $this->flushCache();
        $sql = "SELECT * FROM beers;";
        $connection = $this->conn;
        $query = $connection->query($sql);
        $this->time_end = microtime(true);
        return $query->fetch_all();
    }
    public function delete($value){
        $connection = $this->conn;
        $this->time_start  = microtime(true);
        $sql = " DELETE FROM beers WHERE id=".$value['id'];
        $query = $connection->query($sql);
        $this->time_end = microtime(true);
    }


}