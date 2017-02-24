<?php

/**
 * Created by PhpStorm.
 * User: jose
 * Date: 4/02/17
 * Time: 17:52
 */
class Class_bdpdo{
    private $conn;
    private $time_start;
    private $time_end;
    protected $dsn="mysql:host=127.0.0.1;dbname=charlaphp";
    protected $user = "root";
    protected $pass = "1234";
    public function getTime(){
        return round(($this->time_end - $this->time_start),5);
    }

    public function __construct(){
        $this->conn = new PDO($this->dsn,$this->user,$this->pass);
    }
    public function select(){
        $this->time_start  = microtime(true);
        $sql = " SELECT * FROM beers";
        $consulta = $this->conn->query($sql);
        $this->time_end = microtime(true);
        return $consulta->fetchAll();
    }
}