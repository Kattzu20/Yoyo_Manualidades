<?php 
ob_start();
include "header_volver.php";
include_once "conexion.php";

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM productos WHERE id = $id");
$producto = $result->fetch_assoc();
if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}

if ($_POST) {
    $nombre = $_POST["nombre"];
    $tamaño = $_POST["tamaño"];
    $detalle = $_POST["detalle"];
    $foto_actual = $producto['foto'];
    // Procesar nueva foto si se subió
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        // Borrar la foto anterior si existe
        if ($foto_actual && file_exists("uploads/" . $foto_actual)) {
            unlink("uploads/" . $foto_actual);
        }
        // Guardar nueva foto
        $nombreFoto = time() . '_' . basename($_FILES["foto"]["name"]);
        $rutaDestino = "uploads/" . $nombreFoto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino);
        $foto = $nombreFoto;
    } else {
        $foto = $foto_actual;
    }
    // Actualizar registro en la bd
    $conn->query("UPDATE productos SET
        nombre = '$nombre',
        tamaño = '$tamaño',
        detalle = '$detalle',
        foto = '$foto'
        WHERE id = $id");
    #retornar al index
    header("Location: admin_productos.php");
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
          <h2 class="card-title fredoka">Agregar Producto</h2>

          <div class="card-text">
            <form method="POST" enctype="multipart/form-data">

              <!-- nombre de la muñeca -->
              <div class="mb-3 ">
                <input type="text" class="form-control" name="nombre" value="<?=$producto['nombre']?>" required>
                <label for=" nombre" class="form-label">Nombre de la muñeca:</label><br>
              </div>

              <!-- tamaño de la muñeca -->
              <div class="mb-3 ">
                <select name="tamaño" id="tamaño" class="form-select">
                  <option value="pequeña">Pequeña</option>
                  <option value="mediana">Mediana</option>
                  <option value="grande">Grande</option>
                </select>
                <label for="tamano" class="form-label">Tamaño:</label><br>
              </div>

              <!-- detlles de la muñeca -->
              <div class="mb-3 ">
                <textarea name="detalle" class="form-control" placeholder="<?=$producto['detalle']?>"
                  required></textarea>
                <label for=" detalle" class="form-label">Detalle:</label><br>
              </div>

              <!-- precio de la muñeca -->
              <div class="mb-3 ">
                <input type="number" class="form-control" step="0.01" name="precio" value="<?=$producto['precio']?>"
                  required>
                <label for="precio" class="form-label">Precio:</label><br>
              </div>

              <!-- foto de referencia -->
              <div class="mb-3">
                <label>Foto actual:</label><br>
                <?php if ($producto['foto']): ?>
                <img src="uploads/<?=$producto['foto']?>" width="100" height="100" style="object_fit:cover;">
                <?php else: ?>
                <p>No hay foto</p>
                <?php endif; ?>
                <input type="file" class="form-control" name="foto" id="foto">
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