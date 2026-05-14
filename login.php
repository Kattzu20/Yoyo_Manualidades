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


if($_POST){
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

  // inicio para admins
    
  // revisa si el usuario esta en la base de datos
  $check_login = $conn->prepare("SELECT * FROM admins WHERE correo = ? AND contrasena = ?");
  $check_login->bind_param("ss", $correo, $contrasena);
  $check_login->execute();
  $result_admin = $check_login->get_result();

  
  if($result_admin->num_rows>0){
    //si esta los 2 requerimientos inicia sesion y redirige a la pagina de cuenta
    $row_admin = $result_admin->fetch_assoc(); 
    $_SESSION['id_admin'] = $row_admin['id'];
    $_SESSION['correo_admin'] = $row_admin['correo'];
    $_SESSION['rol'] = 'admin';
    header("Location: dashboard.php");
    exit;
    
  }else{
    echo"<script> alert ('Datos incorrectos'); </script>";
    // si no se encuentra salta una alerta
  }
    
  // inicio para clientes

  // revisa si el usuario esta en la base de datos
  $check_login = $conn->prepare("SELECT * FROM clientes WHERE correo = ? AND contrasena = ?");
  $check_login->bind_param("ss", $correo, $contrasena);
  $check_login->execute();
  $result = $check_login->get_result();

  
  if($result->num_rows>0){
    //si esta los 2 requerimientos inicia sesion y redirige a la pagina de cuenta
    $row = $result->fetch_assoc(); 
    $_SESSION['id_cliente'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['rol'] = 'cliente';
    header("Location: cuenta.php");
    exit;
    
  }else{
    echo"<script> alert ('Datos incorrectos'); </script>";
    // si no se encuentra salta una alerta
  }
}
?>

<h1 class="fredoka mb-4">
    Bienvendo de nuevo</h1>

<!-- caja de color donde va el formulario -->
<div class="card mb-3 c-1">
    <div class="row g-0">

        <div class="col-md-7">
            <div class="card-body">
                <h5 class="card-title fredoka">Inicio de sesion</h5>
                <!-- formulario -->
                <div class="card-text">
                    <form method="post">

                        <!-- correo -->
                        <div class="mb-3 form-floating">
                            <input type="email" name="correo" id="correo" class="form-control <?php if (!empty($error_correo)) {
                                    echo 'is-invalid'; #codigo para verifiar y enseñar error
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

                        <!-- contraseña -->
                        <div class="mb-3 form-floating">
                            <input type="password" name="contrasena" id="psw" class="form-control <?php if (!empty($error_psw)) {
                                        echo 'is-invalid';
                                      } else {
                                        echo '';
                                      } ?>" placeholder="ejemplo" required>
                            <label for="psw">Contraseña</label>
                        </div>
                        <!-- boton para enviar -->
                        <div class="mb-3">
                            <input type="submit" value="Ingresar" class="enviar">
                        </div>
                    </form>
                </div>

                <!-- enlace para el login -->
                <p class="card-text">¿No tienes cuenta?</p>
                <a href="registro.php" role="button" class='btn btn-outline-primary'>Registrate.</a>


            </div>
        </div>
    </div>

    <!-- foto muñecas -->
    <!-- <div class="col-md-5">
        <img src="fotos/tradicional.jpeg" class="img-fluid rounded" alt="Bienvenid@">
    </div> -->


</div>


<?php include "footer.php";?>