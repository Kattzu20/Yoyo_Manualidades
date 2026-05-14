<?php 
ob_start();
include_once "conexion.php";
$id = $_GET['id'];
$result= $conn->query("SELECT foto FROM productos WHERE id=$id");
$producto= $result->fetch_assoc();
if ($producto['foto']){
    unlink("uploads/".$producto['foto']);
}
$conn->query("DELETE FROM pedidos WHERE id_producto = $id");
$conn->query("DELETE FROM productos WHERE id=$id");
header("Location: admin_productos.php");
?>