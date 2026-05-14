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

    $conn->query("INSERT INTO resenas (id_cliente,calificacion,comentario)
     VALUES ('$id_cliente','$calificacion','$comentario')");
     header("Location: info.php");
     
}
?>

<h1 class="fredoka"><b>
        Información
    </b></h1>


<div class="card">
    <div class="card-header c-2">
        Visión
    </div>
    <div class="card-body">
        <figure>
            <blockquote class="blockquote">
                <p>Ser conocidos por cambiar el concepto el valor de las muñecas de trapo como afecto, recuerdo,
                    colección sin importa la edad, uniendo tradición, emoción y creatividad</p>
            </blockquote>
        </figure>
    </div>
</div>

<br>
<div class="card ">
    <div class="card-header c-2">
        Misión
    </div>
    <div class="card-body">
        <figure>
            <blockquote class="blockquote">
                <p>Diseñar y elaborar muñecas de trapo únicas y artesanales, hechas con amor y dedicación, que
                    transmitan valores, despierten emociones y estén pensadas para personas de todas las edades,
                    promoviendo el juego, la creatividad y el vínculo afectivo</p>
            </blockquote>
        </figure>
    </div>
</div>
<br><br>

<!--Reseñas-->
<div class="container text-center mt-4 ">

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
                    </form>
                </div>


                <div class="col-3"></div>
            </div>

        </div>
    </div>

</div>

<?php include "footer.php"
?>