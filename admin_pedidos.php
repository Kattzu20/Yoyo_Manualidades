<?php
session_start();
include "header_admin.php";
include_once "conexion.php";

if ($_POST){
  $estado=$_POST['estado'];
  $id=$_POST['id'];
  $conn->query("UPDATE pedidos SET estado = '$estado'  WHERE id='$id' ");
}
?>
<h1 class="fredoka">
    Pedidos
</h1>


<table class="w-100">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Clientes</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Estado</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $result_res = $conn->query("SELECT p.*, pr.nombre as nombre_producto, pr.precio, cl.nombre as nombre_cliente FROM pedidos as p inner join productos as pr ON p.id_producto = pr.id inner join clientes as cl ON p.id_cliente = cl.id");
          while ($row= $result_res->fetch_assoc()): ?>
        <tr>
            <td><?=$row['id'] ?> </td>
            <td><?=$row['nombre_producto'] ?> </td>
            <td><?=$row['nombre_cliente'] ?> </td>
            <td><?=$row['cantidad'] ?> </td>
            <td>
                <form method='post'>
                    <select name='estado' id='estado' class='est'>
                        <option value='<?=$row['estado'] ?>'> <?=$row['estado'] ?> </option>
                        <option value='pendiente'>Pendiente</option>
                        <option value='terminado'>Terminado</option>
                        <option value='cancelado'>Cancelado</option>
                    </select>
            </td>
            <td>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type='submit' value='Guardar' class='est'>
                </form>
            </td>
        </tr>

        <?php endwhile; ?>
    </tbody>
</table>



<?php
include_once "footer_admin.php";
?>