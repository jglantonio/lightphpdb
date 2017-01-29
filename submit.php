<?php
if(isset($_POST) && ($_POST["cerveza"] != "" && $_POST["pais"] != "")){
    include("Class/Class_bdmysqli.php");
    $mysqli = new bdmysqli();
    $mysqli->insert();
    exit();
    print_r($_POST);
}else{
    header("Location: index.php");
}