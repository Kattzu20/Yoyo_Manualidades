<?php 
ob_start();
include_once "conexion.php";

$id = (int) $_GET['id'];

$result = $conn->query("DELETE FROM resenas WHERE id=$id");
header("Location: cuenta.php");

?>