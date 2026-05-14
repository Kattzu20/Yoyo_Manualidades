<?php
ob_start();
session_start();
include "header_admin.php";
include_once "conexion.php";

if ($_POST) {
    $nombre = $_POST['nombre'];
    $tamano = $_POST['tamano'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];

    $foto = '';
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        $nombreFoto = time() . '_' . basename($_FILES["foto"]["name"]);
        $rutaDestino = "uploads/" . $nombreFoto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino);
        $foto = $nombreFoto;
    } else {
        echo "Error con la imagen";
    }
    $conn->query("INSERT INTO productos (nombre,tamaño,detalle,precio,foto) 
    VALUES ('$nombre','$tamano','$detalle','$precio','$foto')");

    header("Location: admin_productos.php");
}
?>
<h1 class="fredoka">
    Productos
</h1>


<div class="container text-center">
    <div class="card mb-3 c-1">
        <div class="row g-0">


            <div class="col-md-5">
                <div class="card-body">
                    <h2 class="card-title fredoka">Agregar Producto</h2>

                    <div class="card-text">
                        <form method="POST" enctype="multipart/form-data">
                            <!-- nombre de la muñeca -->
                            <div class="mb-3 ">
                                <input type="text" class="form-control" name="nombre" required>
                                <label for="nombre" class="form-label">Nombre de la muñeca:</label><br>
                            </div>
                            <!-- tamaño de la muñeca -->
                            <div class="mb-3 ">
                                <select name="tamano" id="tamano" class="form-select">
                                    <option>selecciona el tamaño</option>
                                    <option value="pequeña">Pequeña</option>
                                    <option value="mediana">Mediana</option>
                                    <option value="grande">Grande</option>
                                </select>
                                <label for="tamano" class="form-label">Tamaño:</label><br>
                            </div>
                            <!-- detlles de la muñeca -->
                            <div class="mb-3 ">
                                <textarea name="detalle" class="form-control" required></textarea>
                                <label for="detalle" class="form-label">Detalle:</label><br>
                            </div>
                            <!-- precio de la muñeca -->
                            <div class="mb-3 ">
                                <input type="number" class="form-control" step="0.01" name="precio" required>
                                <label for="precio" class="form-label">Precio:</label><br>
                            </div>
                            <!-- foto de referencia -->
                            <div class="mb-3 ">
                                <input type="file" class="form-control" name="foto" id="foto">
                                <label for="foto" class="form-label">Foto</label>
                            </div>

                            <div class="mb-3 ">
                                <input type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div class="col-md-7">
                <div class="card-body">


                    <div class="container text-center overflow-auto">
                        <table class="w-100 h-50">
                            <thead>
                                <tr>
                                    <th scope=" col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tamaño</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result_res = $conn->query("SELECT * FROM productos");
                                while ($row = $result_res->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['id']} </td>
                                        <td>{$row['nombre']} </td>
                                        <td>{$row['tamaño']} </td>
                                        <td>{$row['detalle']} </td>
                                        <td>{$row['precio']} </td>
                                        <td><img src='uploads/{$row['foto']}' class='ejem' width='60'  height='60' style='object-fit:corver;'></td>
                                        <td>
                                          <a href='editar_producto.php?id={$row['id']}' class='btn btn-outline-success action'>Editar</a>
                                          <a href='eliminar_producto.php?id={$row['id']}' class='btn btn-outline-danger action' onclick='return confirm(\'¿Eliminar este producto?\')>Eliminar</a>
                                        </td>
                                    </tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>




<?php
include_once "footer_admin.php";
?>