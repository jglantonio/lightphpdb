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
    protected $dsn_mysql="mysql:host=127.0.0.1;dbname=charlaphp";
    protected $user = "root";
    protected $pass = "1234";

    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn_mysql,$this->user,$this->pass);
        }catch (PDOException $e){
            print_r("Error : " . $e->getMessage()." <br>");
        }
    }
    public function select(){
        $this->flushCache();
        $this->time_start  = microtime(true);
        $sql = " SELECT * FROM beers";
        $consulta = $this->conn->query($sql);
        $this->time_end = microtime(true);
        return $consulta->fetchAll();
    }
    public function insert($values){
        $this->time_start = microtime(true);
        $this->flushCache();
        $sql = " INSERT INTO `beers` (`id`, `name`, `country`) ".
            " VALUES (NULL, ?,?)";

        $consulta = $this->conn->prepare($sql);
        $consulta->bindParam(1,$values["cerveza"]);
        $consulta->bindParam(2,$values["pais"]);

        $consulta->execute();

        $this->time_end = microtime(true);
        echo "Insert in : ".$this->getTime();
    }
    public function flushCache(){
        $sql = "RESET QUERY CACHE;";
        $this->conn->query($sql);
    }
    public function getTime(){
        return round(($this->time_end - $this->time_start),5);
    }

}