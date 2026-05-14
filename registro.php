<?php 
ob_start(); // Start output buffering
session_start();

include "header_volver.php";
include_once "conexion.php";

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] === 'admin') {
        header("Location: dashboard.php");
        exit;
    } elseif ($_SESSION['rol'] === 'cliente') {
        header("Location: cuenta.php");
        exit;
    }
}

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
   $result= $conn->query("SELECT * FROM clientes WHERE correo = '$correo' ");
   $row = $result->fetch_assoc(); 
    $_SESSION['id_cliente'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['rol'] = 'cliente';
    header("Location: cuenta.php");
  } 

}
?>

<h1 class="fredoka mb-4">
  Unete a nosotros</h1>

<!-- caja de color donde va el formulario -->
<div class="card mb-3 c-1">
  <div class="row g-0">

    <!-- foto muñeca -->
    <div class="col-md-5">
      <img src="fotos/tradicional.jpeg" class="img-fluid rounded-start" alt="Bienvenid@">
    </div>

    <div class="col-md-7">
      <div class="card-body">
        <h5 class="card-title fredoka">Registrate</h5>
        <!-- formulario -->
        <div class="card-text">
          <form class="needs-validation" novalidate method="POST">
            <!-- campos esnteros -->

            <!-- nombre -->
            <div class="mb-3 form-floating">
              <input type="text" name="nombre" id="nombre" class="form-control"
                value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>" required>
              <label for=" nombre">Nombre Completo</label>

            </div>



            <!-- division para que los elementos esten de a dos en una misma linea -->
            <div class="row">

              <!-- seccion izquerda -->
              <div class="col-6 col-sm-6">

                <!--numero -->
                <div class="mb-3 form-floating">
                  <input type="number" name="numero" id="numero" class="form-control"
                    value="<?php echo htmlspecialchars($_POST['numero'] ?? ''); ?>">
                  <label for="numero">Número de telefono</label>

                </div>
                <!-- ciudad  -->
                <div class="mb-3 form-floating">
                  <input type="text" name="ciudad" id="ciudad" class="form-control"
                    value="<?php echo htmlspecialchars($_POST['ciudad'] ?? ''); ?>">
                  <label for="ciudad">Ciudad</label>
                </div>
              </div>

              <!-- seccion derecha -->
              <div class="col-6 col-sm-6">

                <!-- edad -->
                <div class="mb-3 form-floating">
                  <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                    value="<?php echo htmlspecialchars($_POST['fecha_nacimiento'] ?? ''); ?>" min="1950-01-01"
                    max="2025-10-30" required>
                  <label for="fecha_nacimiento">Fecha de nacimiento</label>

                </div>

                <!-- departamento -->
                <div class="mb-3 form-floating">
                  <select id="departamento" name="departamento" class="form-select" required>
                    <option value="--">----</option>
                    <option value="amazonas"
                      <?php if (($_POST['departamento'] ?? '') == "amazonas") echo "selected"; ?>>
                      Amazonas</option>
                    <option value="antioquia"
                      <?php if (($_POST['departamento'] ?? '') == "antioquia") echo "selected"; ?>>
                      Antioquia</option>
                    <option value="arauca" <?php if (($_POST['departamento'] ?? '') == "arauca") echo "selected"; ?>>
                      Arauca</option>
                    <option value="atlantico"
                      <?php if (($_POST['departamento'] ?? '') == "atlantico") echo "selected"; ?>>
                      Atlántico</option>
                    <option value="bolivar" <?php if (($_POST['departamento'] ?? '') == "bolivar") echo "selected"; ?>>
                      Bolívar</option>
                    <option value="bocaya" <?php if (($_POST['departamento'] ?? '') == "boyaca") echo "selected"; ?>>
                      Boyacá</option>
                    <option value="caldas" <?php if (($_POST['departamento'] ?? '') == "caldas") echo "selected"; ?>>
                      Caldas</option>
                    <option value="caqueta" <?php if (($_POST['departamento'] ?? '') == "caqueta") echo "selected"; ?>>
                      Caqueta</option>
                    <option value="casanare"
                      <?php if (($_POST['departamento'] ?? '') == "casanare") echo "selected"; ?>>
                      Casanare</option>
                    <option value="cauca" <?php if (($_POST['departamento'] ?? '') == "cauca") echo "selected"; ?>>
                      Cauca</option>
                    <option value="cesar" <?php if (($_POST['departamento'] ?? '') == "cesar") echo "selected"; ?>>
                      Cesar</option>
                    <option value="choco" <?php if (($_POST['departamento'] ?? '') == "choco") echo "selected"; ?>>
                      Chocó</option>
                    <option value="cordoba" <?php if (($_POST['departamento'] ?? '') == "cordoba") echo "selected"; ?>>
                      Córdoba</option>
                    <option value="cundinamarca"
                      <?php if (($_POST['departamento'] ?? '') == "cundinamarca") echo "selected"; ?>>
                      Cundinamarca</option>
                    <option value="guainia" <?php if (($_POST['departamento'] ?? '') == "guainia") echo "selected"; ?>>
                      Guaínia</option>
                    <option value="guaviare"
                      <?php if (($_POST['departamento'] ?? '') == "guaviare") echo "selected"; ?>>
                      Guaviare</option>
                    <option value="huila" <?php if (($_POST['departamento'] ?? '') == "huila") echo "selected"; ?>>
                      Huila</option>
                    <option value="la guajira"
                      <?php if (($_POST['departamento'] ?? '') == "la guajira") echo "selected"; ?>>
                      La Guajira</option>
                    <option value="magdalena"
                      <?php if (($_POST['departamento'] ?? '') == "magdalena") echo "selected"; ?>>
                      Magdalena</option>
                    <option value="meta" <?php if (($_POST['departamento'] ?? '') == "meta") echo "selected"; ?>>
                      Meta</option>
                    <option value="nariño" <?php if (($_POST['departamento'] ?? '') == "nariño") echo "selected"; ?>>
                      Nariño</option>
                    <option value="norte de santander"
                      <?php if (($_POST['departamento'] ?? '') == "norte de santander") echo "selected"; ?>>
                      Norte de Santander</option>
                    <option value="putumayo"
                      <?php if (($_POST['departamento'] ?? '') == "putumayo") echo "selected"; ?>>
                      Putumayo</option>
                    <option value="quindio" <?php if (($_POST['departamento'] ?? '') == "quindio") echo "selected"; ?>>
                      Quindío</option>
                    <option value="risaralda"
                      <?php if (($_POST['departamento'] ?? '') == "risaralda") echo "selected"; ?>>
                      Risaralda</option>
                    <option value="san andres y providencia"
                      <?php if (($_POST['departamento'] ?? '') == "san andres y providencia") echo "selected"; ?>>
                      San Andrés y Providencia</option>
                    <option value="santander"
                      <?php if (($_POST['departamento'] ?? '') == "santander") echo "selected"; ?>>
                      Santander</option>
                    <option value="sucre" <?php if (($_POST['departamento'] ?? '') == "sucre") echo "selected"; ?>>
                      Sucre</option>
                    <option value="tolima" <?php if (($_POST['departamento'] ?? '') == "tolima") echo "selected"; ?>>
                      Tolima</option>
                    <option value="valle de cauca"
                      <?php if (($_POST['departamento'] ?? '') == "valle de cauca") echo "selected"; ?>>
                      Valle del Cauca</option>
                    <option value="vaupes" <?php if (($_POST['departamento'] ?? '') == "vaupes") echo "selected"; ?>>
                      Vaupés</option>
                    <option value="vichada" <?php if (($_POST['departamento'] ?? '') == "vichada") echo "selected"; ?>>
                      Vichada</option>
                  </select>
                  <label for="departamento">Departamento</label>

                </div>

              </div>

            </div><!-- fin row -->

            <!-- campos enteros -->
            <!-- direccion -->
            <div class="mb-3 form-floating">
              <input type="text" name="direccion" id="direccion" class="form-control"
                value="<?php echo htmlspecialchars($_POST['direccion'] ?? ''); ?>" required>
              <label for="direccion">Dirección</label>
            </div>
            <!-- correo -->
            <div class="mb-3 form-floating">
              <input type="email" name="correo" id="correo" class="form-control <?php if (!empty($error_correo)) {
                echo 'is-invalid';
              } else {
                echo '';
              } ?>" value="<?php echo htmlspecialchars($_POST['correo'] ?? ''); ?>" required>
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
                    } ?>" placeholder="ejemplo" required>
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
                  } ?>" placeholder=" ejemplo" required>
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

        <!-- enlace para el login -->
        <p class="card-text">¿Ya tienes cuenta?</p>
        <a href="login.php" role="button" class='btn btn-outline-primary'>Iniciar Sesión.</a>

      </div>
    </div>
  </div>

  <script>
  (() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
  </script>


</div>

<?php include "footer.php";?>