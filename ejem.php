<?php 
ob_start(); 
session_start();

include "header.php";
include_once "conexion.php";

if(!isset($_SESSION['id_cliente'])){
    header("Location: registro.php");
    exit;
}
if($_POST){
    $id_cliente=$_SESSION['id_cliente'];
    $calificacion=$_POST['calidad'];
    $comentario=$_POST['comentario'];

    $conn->query("INSERT INTO reseñas (id_cliente,calificacion,comentario)
     VALUES ('$id_cliente','$calificacion','$comentario')");
     header("Location: compra.php");
     
}
?>


<h1 class="fredoka">
    <center>Reseñas</center>
</h1>


<div class="container text-center">
    <div class="row">
        <div class="col-3"></div>

        <div class="col-6">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label" for="calidad">Calificación</label>
                    <select name="calidad" class="form-select" id="calidad">
                        <option value="1_estrella">★☆☆☆☆</option>
                        <option value="2_estrella">★★☆☆☆</option>
                        <option value="3_estrella">★★★☆☆</option>
                        <option value="4_estrella">★★★★☆</option>
                        <option value="5_estrella">★★★★★</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="comentario">Comentario</label>
                    <textarea class="form-control" name="comentario" id="comentario"></textarea>
                </div>
                <div class="mb-3">
                  <input type="submit" value="Enviar">
                </div>
        </div>

        </form>
        <div class="col-3"></div>
    </div>
</div>



<?php include "footer.php";?>