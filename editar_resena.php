<?php 
ob_start();
session_start();
include "header_volver.php";
include_once "conexion.php";

if(!isset($_SESSION['id_cliente'])){
    header("Location: registro.php");
    exit;
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM resenas WHERE id = $id");
$resena = $result->fetch_assoc();
if (!$resena) {
    echo "Reseña no encontrada.";
    exit;
}

 
if ($_POST) {
  $calificacion=$_POST['calidad'];
  $comentario=$_POST['comentario'];
  $id_cli=$_POST['id'];

  $conn->query("UPDATE resenas SET
      calificacion = '$calificacion',
      comentario = '$comentario'
      WHERE id = $id");
    header("Location: cuenta.php");
    exit;
}
?>

<div class="container text-center">
    <div class="row g-0">
        <div class="col-3"></div>
        <!--Espacio para centrar-->

        <h1 class="fredoka"> Reseñas</h1>

        <div class="card c-2">
            <div class="card-body">

                <div class="row">
                    <div class="col-3"></div>

                    <div class="col-6">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label" for="calidad">Calificación</label>
                                <select name="calidad" class="form-select" id="calidad">
                                    <option value="1_estrella"
                                        <?php if (($resena['calificacion']) == "1") echo "selected"; ?>>
                                        ★☆☆☆☆</option>
                                    <option value="2_estrella"
                                        <?php if (($resena['calificacion']) == "2") echo "selected"; ?>>★★☆☆☆</option>
                                    <option value="3_estrella"
                                        <?php if (($resena['calificacion']) == "3") echo "selected"; ?>>★★★☆☆</option>
                                    <option value="4_estrella"
                                        <?php if (($resena['calificacion']) == "4") echo "selected"; ?>>
                                        ★★★★☆</option>
                                    <option value="5_estrella"
                                        <?php if (($resena['calificacion']) == "5") echo "selected"; ?>>★★★★★</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="comentario">Comentario</label>
                                <textarea class="form-control" name="comentario" id="comentario"
                                    placeholder="<?=$resena['comentario']?>"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $_SESSION['id_cliente']?>">
                                <input type="submit" value="Enviar">
                            </div>
                        </form>
                    </div>


                    <div class="col-3"></div>
                </div>

            </div>
        </div>

    </div>

</div>

<div class="col-3"></div>
<!--Espacio para centrar-->

<?php include "footer_admin.php" ?>