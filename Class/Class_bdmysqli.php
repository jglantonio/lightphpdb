<?php

/**
 * Created by PhpStorm.
 * User: jose
 * Date: 29/01/17
 * Time: 15:54
 */
class mysqli
{
    private $conn;
    public function __construct(){
        $this->conn = mysqli_connect("127.0.0.1","root","1234","clarlaphp");
    }
    public function insert($values){
        
    }

}