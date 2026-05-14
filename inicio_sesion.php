<?php include "header_volver.php";
include_once "conexion.php";

$error_correo = "";
$error_psw = "";

if($_POST){
  $nombre=$_POST['nombre'];
  $correo=$_POST['correo'];
  $contrasena=$_POST['contrasena'];
  $confirmacion=$_POST['con-psw'];
  $numero=$_POST['numero'];
  $fecha_nacimiento=$_POST['fecha_nacimiento'];
  $ciudad=$_POST['ciudad'];
  $direccion=$_POST['direccion'];
  $departamento=$_POST['departamento'];

  $check_correo = $conn->prepare("SELECT id FROM clientes WHERE correo = ?");
  $check_correo->bind_param("s", $correo);
  $check_correo->execute();
  $check_correo->store_result();

  if ($check_correo->num_rows > 0) {
    $error_correo="El correo ya está en uso.";
  } 
  elseif ($contrasena != $confirmacion) {
    $error_psw="Las contraseñas deben ser iguales.";
  } 
  else {
    $conn->query("INSERT INTO clientes (nombre,fecha_nacimiento,correo,numero,ciudad,direccion,departamento,contrasena)
   VALUES ('$nombre','$fecha_nacimiento','$correo','$numero','$ciudad','$direccion','$departamento','$contrasena')");
   
  } 
}
?>

<h1 class="fredoka mb-4">
  Unete a nosotros</h1>

<!-- caja de color donde va el formulario -->
<div class="card mb-3">
  <div class="row g-0">

    <!-- foto muñecas -->
    <div class="col-md-5">
      <img src="fotos/tradicional.jpeg" class="img-fluid rounded-start" alt="Bienvenid@">
    </div>

    <div class="col-md-7">
      <div class="card-body">
        <h5 class="card-title fredoka">Registrate</h5>
        <!-- formulario -->
        <div class="card-text">
          <form method="post">
            <!-- campos esnteros -->

            <!-- nombre -->
            <div class="mb-3 form-floating">
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Pedro ocampo" require>
              <label for=" nombre">Nombre Completo</label>
            </div>



            <!-- division para que los elementos esten de a dos en una misma linea -->
            <div class="row">

              <!-- seccion izquerda -->
              <div class="col-6 col-sm-6">

                <!--numero -->
                <div class="mb-3 form-floating">
                  <input type="number" name="numero" id="numero" class="form-control" placeholder="3001234567">
                  <label for="numero">Numero</label>
                </div>
                <!-- ciudad  -->
                <div class="mb-3 form-floating">
                  <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Bogotá">
                  <label for="ciudad">Ciudad</label>
                </div>
              </div>

              <!-- seccion derecha -->
              <div class="col-6 col-sm-6">

                <!-- edad -->
                <div class="mb-3 form-floating">
                  <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                    placeholder="01/01/2000" require>
                  <label for="fecha_nacimiento">Fecha de nacimiento</label>
                </div>
                <!-- departamento -->
                <div class="mb-3 form-floating">
                  <select id="departamento" name="departamento" class="form-select">
                    <option value="--">----</option>
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

            </div><!-- fin row -->

            <!-- campos enteros -->
            <!-- direccion -->
            <div class="mb-3 form-floating">
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="cra.99 #123" require>
              <label for="direccion">Dirección</label>
            </div>
            <!-- correo -->
            <div class="mb-3 form-floating">
              <input type="email" name="correo" id="correo" class="form-control <?php if (!empty($error_correo)) {
                echo 'is-invalid';
              } else {
                echo '';
              } ?>" placeholder="ejemplo@gmail.com" required>
              <label for="correo">Correo</label>
              <?php if (!empty($error_correo)): ?>
              <div class="invalid-feedback">
                <?php echo $error_correo; ?>
              </div>
              <?php endif; ?>
            </div>

            <!-- contraseña y confirmacion -->
            <div class="row mb-3">

              <!-- seccion izquerda -->
              <div class="col-6 col-sm-6">
                <!-- contraseña -->
                <div class=" form-floating">
                  <input type="password" name="contrasena" id="psw" class="form-control <?php if (!empty($error_psw)) {
                      echo 'is-invalid';
                    } else {
                      echo '';
                    } ?>" placeholder="ejemplo" require>
                  <label for="psw">Contraseña</label>
                </div>
              </div>

              <!-- seccion derecha -->
              <div class="col-6 col-sm-6">
                <!-- confirmacion -->
                <div class=" form-floating">
                  <input type="password" name="con-psw" id="con-psw" class="form-control <?php if (!empty($error_psw)) {
                    echo 'is-invalid';
                  } else {
                    echo '';
                  } ?>" placeholder=" ejemplo" require>
                  <label for="con-psw">Confirma la contraseña</label>
                </div>

              </div>
              <!-- alerta de contraseñas -->
              <div class="invalid-feedback">
                <?php 
                      if (!empty($error_psw)) {
                          echo $error_psw;
                      } else {
                          echo"";
                      }
                      ?>
              </div>

            </div><!-- fin row -->


            <!-- boton para enviar -->
            <div class="mb-3">
              <input type="submit" value="Ingresar" class="enviar">
            </div>



          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php";?>