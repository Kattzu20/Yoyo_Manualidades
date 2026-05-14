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


$result = $conn->query("SELECT * FROM clientes WHERE id = $id");
$cliente = $result->fetch_assoc();
if (!$cliente) {
    echo "cliente no encontrado.";
    exit;
}

if ($_POST) {
  $nombre=$_POST['nombre'];
  $correo=$_POST['correo'];
  $numero=$_POST['numero'];
  $fecha_nacimiento=$_POST['fecha_nacimiento'];
  $ciudad=$_POST['ciudad'];
  $direccion=$_POST['direccion'];
  $departamento=$_POST['departamento'];
  $_SESSION['nombre'] = $_POST['nombre'];
  
    
  $conn->query("UPDATE clientes SET
      nombre = '$nombre',
      correo = '$correo',
      numero = '$numero',
      fecha_nacimiento = '$fecha_nacimiento',
      ciudad = '$ciudad',
      direccion = '$direccion',
      departamento = '$departamento'
      WHERE id = $id");
    header("Location: cuenta.php");
    exit;
}
?>

<div class="container text-center">
  <div class="card mb-3 c-1">
    <div class="row g-0">
      <div class="col-3"></div>
      <!--Espacio para centrar-->


      <div class="col-md-6">
        <div class="card-body">
          <h2 class="card-title fredoka">Editar información personal</h2>

          <div class="card-text">
            <form method="POST" enctype="multipart/form-data">

              <!-- nombre -->
              <div class="mb-3 form-floating">
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$cliente['nombre']?>"
                  required>
                <label for=" nombre">Nombre Completo</label>
              </div>

              <div class="row">

                <!-- seccion izquerdo -->
                <div class="col-6 col-sm-6">
                  <!-- numero -->
                  <div class="mb-3 form-floating">
                    <input type="number" name="numero" id="numero" class="form-control" value="<?=$cliente['numero']?>">
                    <label for="numero">Numero</label>
                  </div>

                  <!-- ciudad  -->
                  <div class="mb-3 form-floating">
                    <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?=$cliente['ciudad']?>">
                    <label for="ciudad">Ciudad</label>
                  </div>
                </div>

                <!-- seccion diestro -->
                <div class="col-6 col-sm-6">
                  <!-- edad -->
                  <div class="mb-3 form-floating">
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                      value="<?=$cliente['fecha_nacimiento']?>" required>
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                  </div>

                  <!-- departamento -->
                  <div class="mb-3 form-floating">
                    <select id="departamento" name="departamento" class="form-select" required>
                      <option value="<?=$cliente['departamento']?>"><?=$cliente['departamento']?></option>
                      <option value="amazonas">Amazonas</option>
                      <option value="antioquia">Antioquia</option>
                      <option value="arauca">Arauca</option>
                      <option value="atlantico">Atlántico</option>
                      <option value="bolivar">Bolívar</option>
                      <option value="bocaya">Boyacá</option>
                      <option value="caldas">Caldas</option>
                      <option value="caqueta">Caqueta</option>
                      <option value="casanare">Casanare</option>
                      <option value="cauca">Cauca</option>
                      <option value="cesar">Cesar</option>
                      <option value="choco">Chocó</option>
                      <option value="cordoba">Córdoba</option>
                      <option value="cundinamarca">Cundinamarca</option>
                      <option value="guainia">Guaínia</option>
                      <option value="guaviare">Guaviare</option>
                      <option value="huila">Huila</option>
                      <option value="la guajira">La Guajira</option>
                      <option value="magdalena">Magdalena</option>
                      <option value="meta">Meta</option>
                      <option value="nariño">Nariño</option>
                      <option value="norte de santander">Norte de Santander</option>
                      <option value="putumayo">Putumayo</option>
                      <option value="quindio">Quindío</option>
                      <option value="risaralda">Risaralda</option>
                      <option value="san andres y providencia">San Andrés y Providencia</option>
                      <option value="santander">Santander</option>
                      <option value="sucre">Sucre</option>
                      <option value="tolima">Tolima</option>
                      <option value="valle de caca">Valle del Cauca</option>
                      <option value="vaupes">Vaupés</option>
                      <option value="vichada">Vichada</option>
                    </select>
                    <label for="departamento">Departamento</label>
                  </div>

                </div>
              </div>

              <!-- direccion -->
              <div class="mb-3 form-floating">
                <input type="text" name="direccion" id="direccion" class="form-control" value="<?=$cliente['direccion']?>"
                  required>
                <label for=" direccion">Dirección</label>
              </div>

              <!-- correo -->
              <div class="mb-3 form-floating">
                <input type="email" name="correo" id="correo" class="form-control <?php if (!empty($error_correo)) {
                echo 'is-invalid';
              } else {
                echo '';
              } ?>" value='<?=$cliente['correo']?>' required>
                <label for="correo">Correo</label>
                <?php if (!empty($error_correo)): ?>
                <div class="invalid-feedback">
                  <?php echo $error_correo; ?>
                </div>
                <?php endif; ?>
              </div>


              <div class="mb-3 ">
                <input type="submit" value="Guardar cambios">
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-3"></div>
<!--Espacio para centrar-->

<?php include "footer_admin.php" ?>