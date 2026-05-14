<?php
session_start();
include "header_admin.php";
include_once "conexion.php";

?>
<h1 class="fredoka">
  Reseñas
</h1>

<table class="w-100">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Calidad</th>
      <th scope="col">Descripción</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $result_res = $conn->query("SELECT r.*, cl.nombre as nombre_cliente from resenas as r inner join clientes as cl on r.id_cliente = cl.id");
    while ($row= $result_res->fetch_assoc() ) {
      echo "<tr>
        <td>{$row['id']} </td>
        <td>{$row['nombre_cliente']} </td>
        <td>{$row['calificacion']} </td>
        <td>{$row['comentario']} </td>
      </tr>";
    }
    ?>
  </tbody>
</table>

<?php
include_once "footer_admin.php";
?>