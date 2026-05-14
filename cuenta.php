<?php 
ob_start(); // Start output buffering
session_start();

include "header.php";
include_once "conexion.php";

if(!isset($_SESSION['id_cliente'])){
    header("Location: registro.php");
    exit;
}
$id=$_SESSION['id_cliente']
?>


<h1 class="fredoka mt-4"><b>
    Bienvenido <?php echo $_SESSION['nombre']?>
  </b></h1>
<br>
<div class="container text-center">
  <main class="row">

    <?php $result_cl=$conn->query("SELECT * FROM clientes WHERE id='$id'");
        while($row_cl=$result_cl->fetch_assoc()):?>

    <div class="col-6">
      <h2>Información personal</h2>
      <div class="mb-4">
        <!-- nombre -->
        <h5>Nombre:</h5>
        <p><?=$row_cl['nombre']?></p>
      </div>
      <div class="mb-4">
        <!-- correo -->
        <h5>Correo:</h5>
        <p><?=$row_cl['correo']?></p>
      </div>
      <div class="mb-4">
        <!-- fecha nacimiento -->
        <h5>Fecha de nacimiento:</h5>
        <p><?=$row_cl['fecha_nacimiento']?></p>
      </div>

      <ul class="nav justify-content-center Quicksand">
        <div class="nav-item">
          <?php
            endwhile;
                echo '<a href="editar_cliente.php?id=' . $_SESSION['id_cliente'] . '" class="btn btn1 btn-sm">Editar</a>';
            ?>
        </div>
        <div class="nav-item">
          <a href="cerrar_sesion.php" class="btn btn-danger btn-sm">Cerrar sesion</a>
        </div>
      </ul>
    </div>




    <div class="col-6">
      <div class="card c-1 mb-3">
        <h4>Productos</h4>

        <div class="card" style="width: 100%; height: 150px;">

          <div class="table-responsive" style="max-height: 150px; overflow-y: auto;">
            <table class="table table-striped align-middle text-center  c-1">
              <thead>
                <tr>
                  <th>Muñeca</th>
                  <th>Cantidad</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>

              <?php $result_pr=$conn->query("SELECT p.*, pr.nombre as nombre_producto FROM pedidos as p inner join productos as pr ON p.id_producto = pr.id WHERE id_cliente=$id");
                            while($row_pr=$result_pr->fetch_assoc()):?>

              <tbody class="overflow-auto">
                <tr>
                  <!-- nombre muñeca -->
                  <td class=" c-1">
                    <?=$row_pr['nombre_producto']?>
                  </td>
                  <!-- cantidad -->
                  <td class="c-1">
                    <?=$row_pr['cantidad']?>
                  </td>
                  <!--estado -->
                  <td class="c-1">
                    <?=$row_pr['estado']?>
                  </td>
                  <!-- eliminar pedido -->
                  <td> <a href="cancelar_pedido.php?id=<?=$row_pr['id']?>" class="btn btn-outline-danger"
                      onclick="return confirm('¿Seguro que deseas cancelar este pedido?');">Cancelar</a>
                    <a href="eliminar_pedido.php?id=<?=$row_pr['id']?>" class="btn btn-outline-danger"
                      onclick="return confirm('¿Seguro que deseas eliminar este pedido?');">Eliminar</a>
                  </td>
                </tr>
              </tbody>
              <?php endwhile;?>
            </table>
          </div>
        </div>



      </div>

      <div class="card c-2">
        <h4>Reseñas</h4>

        <div class="card" style="width: 100%; height: 150px;">

          <div class="table-responsive" style="max-height: 150px; overflow-y: auto;">
            <table class="table table-striped align-middle text-center  c-1">
              <thead>
                <tr>
                  <th>Calificaficación</th>
                  <th>Comentario</th>
                  <th></th>
                </tr>
              </thead>

              <?php $result_re=$conn->query("SELECT * FROM resenas WHERE id_cliente='$id'");
                            while($row_re=$result_re->fetch_assoc()):?>

              <tbody class="overflow-auto">
                <tr>
                  <!-- cantidad -->
                  <td class="c-1">
                    <?=$row_re['calificacion']?>
                  </td>
                  <!--estado -->
                  <td class="c-1">
                    <?=$row_re['comentario']?>
                  </td>
                  <!-- eliminar pedido -->
                  <td>
                    <a href="editar_resena.php?id=<?=$row_re['id']?>" class="btn btn-outline-primary">Editar
                      comentario</a>

                    <a href="eliminar_resena.php?id=<?=$row_re['id']?>" class="btn btn-outline-danger"
                      onclick="return confirm('¿Seguro que deseas eliminar esta reseña?');">Eliminar comentario</a>
                  </td>
                </tr>
              </tbody>
              <?php endwhile;?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3">
      <?php
                echo "<a href='eliminar_cliente.php?id=" . $_SESSION['id_cliente'] . "' class='btn btn-danger' onclick=\"return confirm('¿Seguro que deseas eliminar esta cuenta?');\" '>Eliminar cuenta </a>";
            ?>
    </div>

  </main>
</div>

<?php include "footer.php"
?>