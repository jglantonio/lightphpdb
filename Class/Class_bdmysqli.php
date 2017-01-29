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
        return round(($this->time_end - $this->time_start)/1000000000,4);
    }
    public function __construct(){
        $this->conn = new mysqli("127.0.0.1","root","1234","charlaphp");
    }
    public function insert($values){
        $this->time_start  = system('date +%N');
        $sql = " INSERT INTO `beers` (`id`, `name`, `country`) ".
               " VALUES (NULL, '".$values["cerveza"]."', '".$values["pais"]."');";
        $connection = $this->conn;
        $connection->set_charset("UTF-8");
        $query = $connection->query($sql);
        $query->close();
        $this->time_end = system('date +%N');
    }
    public function select(){
        $this->time_start  = system('date +%N');
        $sql = " SELECT * FROM beers";
        $connection = $this->conn;
        $query = $connection->query($sql);
        $this->time_end = system('date +%N');
        return $query->fetch_all();
    }

}