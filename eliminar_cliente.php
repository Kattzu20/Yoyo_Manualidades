<?php 
ob_start();
include_once "conexion.php";

$id = (int) $_GET['id'];

$result = $conn->query("DELETE FROM clientes WHERE id=$id");
header("Location: cerrar_sesion.php");

?>
