<?php 
ob_start();
include_once "conexion.php";
$id = (int) $_GET['id'];
$result = $conn->query("SELECT estado FROM pedidos WHERE pedidos.id='$id'");
$row = $result->fetch_assoc();
if ($row['estado'] ==='pendiente'){
    $result = $conn->query("UPDATE pedidos SET estado = 'cancelado'  WHERE pedidos.id='$id'");
    header("Location: cuenta.php");
}else{
    header("Location: cuenta.php");
}
?>