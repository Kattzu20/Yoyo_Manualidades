<?php 
ob_start(); // Start output buffering
session_start();

include "header.php";
include_once "conexion.php";

?>

<h1 class="fredoka"><b>
         Inicio 
    </b></h1>

<div id="carouselExample" class="carousel slide">
    <center>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="fotos/muñeca.jpg" class="d-block" height="500px">
            </div>
            <div class="carousel-item">
                <img src="fotos/foamy.jpg" class="d-block" height="500px">
            </div>
            <div class="carousel-item">
                <img src="fotos/navidad.jpg" class="d-block" height="500px">
            </div>
        </div>
    </center>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<br>

<div class="container text-center">

    <div class="wow fadeInLeft" data-wow-offset="0">

        <div class="card mb-3 c-1">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="fotos/costura.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title poppins-black">-Todo creado a mano-</h5>
                        <p class="card-text poppins-light">Nuestros productos destacan por su excelente calidad y el
                            cuidado que ponemos en cada etapa de su preparación. Desde la selección de los
                            ingredientes hasta los últimos detalles de presentación, nos esforzamos por ofrecer lo
                            mejor. Cada una de nuestras piezas es elaborada a mano, con dedicación,
                            amor y atención al detalle, reflejando el compromiso que tenemos con nuestros clientes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="wow fadeInRight" data-wow-offset="0">
        <div class="card mb-3 c-1">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title poppins-black">-Son el mejor regalo-</h5>
                        <p class="card-text poppins-light">Estas muñecas están pensadas para personas de todas las
                            edades, desde los primeros meses de vida hasta la adultez. Son perfectas para regalar
                            en ocasiones especiales o simplemente como un detalle lleno de ternura y significado. Cada
                            una se convierte en un hermoso recuerdo que acompaña y emociona.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="fotos/maquinas de coser.jpg" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    </div>



</div>
<?php include "footer.php"
?>