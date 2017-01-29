<?php
if(isset($_POST) && ($_POST["cerveza"] != "" && $_POST["pais"] != "")){
    include("Class/Class_bdmysqli.php");
    $mysqli = new Class_bdmysqli();
    $mysqli->insert($_POST);
    header("Location: index.php");
}else{
    header("Location: index.php");
}