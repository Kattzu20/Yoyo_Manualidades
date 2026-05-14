<?php 
ob_start();
session_start();
include "header.php";
include_once "conexion.php";

if(!isset($_SESSION['id_cliente']))
    header("Location: registro.php");
    exit;

$id_producto=(int)$_GET['id'];
$id_cliente=$_SESSION['id_cliente'];

if($_POST){
    $cantidad=$_POST['cantidad'] ?? '' ;

    $stmt_select = $conn->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $producto = $result->fetch_assoc();
    $stmt_select->close();

    if (!$producto) {
        $error = "El producto no fue encontrado en la base de datos.";
    }else{
        $conn->query("INSERT INTO pedido (id_producto, id_cliente, cantidad) 
    VALUES ('$id_producto','$id_cliente','$cantidad')");
    }
    
}
?>

<form method="post">

    <div class="container text-center">
        <div class="row align-items-start">
            <label for="cantidad">¿Cuantas muñecas necesita?</label>

            

        </div>
    </div>

</form>
<?php include "footer.php"; ?>