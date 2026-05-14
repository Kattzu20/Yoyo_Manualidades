<?php
    $host="localhost";
    $user="root";
    $pass="";
    $port=3306;
    $dbname="monecas";

    $conn= new mysqli($host,$user,$pass,$dbname,$port);

    if($conn->connect_error){
        die("Conexión fallida: " .$conn->connect_error);
    }
?>