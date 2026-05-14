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
    $id_producto=$_POST['id'];
    $cantidad=$_POST['cantidad'];
    $estado=$_POST['estado'];

    $conn->query("INSERT INTO pedidos (id_producto,id_cliente,cantidad,estado)
     VALUES ('$id_producto','$id_cliente','$cantidad','$estado')");
     header("Location: compra.php?success=1");
}

?>


<h1 class="fredoka">
  Catalogo
</h1>

<ul class="nav justify-content-center Quicksand">
    <li class="nav-item">
        <button class="btn btn1 shadow mb-4">
            <a href="compra.php">General</a>
        </button>
    </li>
    <li class="nav-item">
        <button class="btn btn1 shadow mb-4">
            <a href="pequeñas.php">Pequeñas</a>
        </button>
    </li>
    <li class="nav-item">
        <button class="btn btn1 shadow mb-4">
            <a href="medianas.php">Medianas</a>
        </button>
    </li>
    <li class="nav-item">
        <button class="btn btn1 shadow mb-4">
            <a href="grande.php">Grandes</a>
        </button>
    </li>
    
</ul>

<div class="container text-center">
    <div class="row">

        <?php
        $result_pro=$conn->query("SELECT * from productos where tamaño = 'grande' ");
        while ($row_pro=$result_pro->fetch_assoc()):
          $modal_id = "exampleModalToggle" . $row_pro['id'];
      ?>
        <div class='col-4 poppins-medium'>
            <div class='card c-1 mb-4' style='width: 18rem;'>
                <!--foto representativa-->
                <img src='uploads/<?=$row_pro['foto']?>' class='card-img-top ejem' alt='Foto de como se visualiza'>

                <div class='card-body'>
                    <p class='card-text'> <?=$row_pro['nombre']?> </p>
                    <p class='card-text'><small> $<?=$row_pro['precio']?> </small></p>
                    <button class='btn btn1' data-bs-target='#<?= $modal_id ?>' data-bs-toggle='modal'>¡Comprar ya!</button>
                </div>

                <!--Ventana emergente-->
                <div class='modal fade' id='<?= $modal_id ?>' aria-hidden='true' aria-labelledby='<?= $modal_id ?>Label'
                    tabindex='-1'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>

                            <!-- cabeza tarjeta-->
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='<?=$modal_id?>Label'> <?=$row_pro['nombre']?> </h1>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'
                                    aria-label='Close'></button>
                            </div>

                            <!-- cuerpo tarjeta-->
                            <div class='modal-body row'>

                                <div class='col-5'>
                                    <!-- foto de la muñeca -->
                                    <img src='uploads/<?=$row_pro['foto']?>' width='80px'>
                                </div>

                                <div class='col-7'>
                                    <!-- Información de la compra -->
                                    <form method='post'>
                                        <!-- Formulario en horizontal -->

                                        <div class='mb-3 row'>
                                            <!-- Id -->
                                            <label for='id' class='col-sm-5 col-form-label'>#</label>
                                            <div class='col-sm-7'>
                                                <input type='number' readonly class='form-control-plaintext' id='id'
                                                    value='<?=$row_pro['id']?>'>
                                            </div>
                                        </div>

                                        <div class='mb-3 row'>
                                            <!-- Precio -->
                                            <label for='valor' class='col-sm-5 col-form-label'>Valor:</label>
                                            <div class='col-sm-7'>
                                                <input type='number' readonly class='form-control-plaintext' id='valor'
                                                    value='<?=$row_pro['precio']?>'>
                                            </div>
                                        </div>

                                        <div class='mb-3 row'>
                                            <!-- Tamaño -->
                                            <label for='tamaño' class='col-sm-5 col-form-label'>Tamaño:</label>
                                            <div class='col-sm-7'>
                                                <input type='text' readonly class='form-control-plaintext' id='tamaño'
                                                    value='<?=$row_pro['tamaño']?>'>
                                            </div>
                                        </div>

                                        <div class='mb-3 row'>
                                            <!-- Detalles -->
                                            <label for='detalle' class='col-sm-5 col-form-label'>Detalle:</label>
                                            <div class='col-sm-7'>
                                                <input type='detalle' readonly class='form-control-plaintext'
                                                    id='detalle' value='<?=$row_pro['detalle']?>'>
                                            </div>
                                        </div>

                                        <div class='mb-3 row'>
                                            <!-- Cantidad -->
                                            <label for='cantidad<?=$row_pro['id']?>'
                                                class='col-sm-5 col-form-labell'>Cantidad:</label>
                                            <div class='col-sm-7'>
                                                <input type='range' class='form-range' min='1' max='5' value='3'
                                                    id='cantidad<?=$row_pro['id']?>'>
                                                <output for='cantidad' id='rangeValue<?=$row_pro['id']?>'
                                                    aria-hidden='true'></output>
                                                <!-- script para el contador -->
                                                <script>
                                                const rangeInput<?=$row_pro['id']?> = document.getElementById(
                                                    'cantidad<?=$row_pro['id']?>');
                                                const rangeOutput<?=$row_pro['id']?> = document.getElementById(
                                                    'rangeValue<?=$row_pro['id']?>');
                                                rangeOutput<?=$row_pro['id']?>.textContent =
                                                    rangeInput<?=$row_pro['id']?>.value;
                                                rangeInput<?=$row_pro['id']?>.addEventListener('input', function() {
                                                    rangeOutput<?=$row_pro['id']?>.textContent = this.value;
                                                });
                                                </script>
                                            </div>
                                        </div>

                                    </form>
                                </div>


                            </div><!-- modal-body row -->

                            <!-- pie tarjeta-->
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>

                                <!-- Formulario que lleva la informacion al php -->
                                <form method='post'>
                                    <!-- id del producto -->
                                    <input type='hidden' name='id' value='<?=$row_pro['id']?>'>

                                    <!--Estado del pedido-->
                                    <input type='hidden' name='estado' value='nuevo'>

                                    <!-- cantidad -->
                                    <input type='hidden' name='cantidad' id='cantidadInput<?=$row_pro['id']?>'
                                        value='3'>

                                    <input type='submit' value='Ingresar' class='btn toast-trigger'>
                                </form>

                            </div><!-- modal-footer -->

                        </div><!-- modal-content -->
                    </div><!-- modal-dialog modal-dialog-centered -->
                </div><!-- modal fade -->


            </div><!-- card c-1 -->
        </div><!-- col-4 poppins-medium -->

        <?php endwhile; ?>
        <br>
    </div><!-- row align-items-start-->
</div><!-- container text-center -->


<!--Alerta de compra confirmada-->
<div class="toast-container position-fixed bottom-0 end-0 p-3 poppins-medium">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
            </svg>
            <strong class="me-auto fredoka"> Compra confirmada</strong>
            <small>hace 1 min </small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body poppins-light">
            Tu compra se realizo de manera correcta
        </div>
    </div>
</div>



<!-- script para guardar la cantidad -->
<script>
const slider<?=$row_pro['id']?> = document.getElementById('cantidad<?=$row_pro['id']?>');
const hiddenInput<?=$row_pro['id']?> = document.getElementById('cantidadInput<?=$row_pro['id']?>');
const output<?=$row_pro['id']?> = document.getElementById('rangeValue<?=$row_pro['id']?>');

slider<?=$row_pro['id']?>.addEventListener('input', function() {
    output<?=$row_pro['id']?>.textContent = this.value;
    hiddenInput<?=$row_pro['id']?>.value = this.value;
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Si la URL contiene ?success=1, muestra el toast automáticamente
    const params = new URLSearchParams(window.location.search);
    if (params.has('success')) {
        const toastLive = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastLive);
        toast.show();

        // Limpia el parámetro para que no se repita al recargar
        const newUrl = window.location.origin + window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
});
</script>


<?php include "footer.php";?>