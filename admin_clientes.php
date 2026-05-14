<?php
session_start();
include "header_admin.php";
include_once "conexion.php";

?>
<h1 class="fredoka">
  Clientes
</h1>

<table class="w-100">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Departamento</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Direccion</th>
      <th scope="col">Fecha de nacimiento</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result_res = $conn->query("SELECT * FROM clientes");
    while ($row= $result_res->fetch_assoc() ) {
      echo "<tr>
        <td>{$row['id']} </td>
        <td>{$row['nombre']} </td>
        <td>{$row['correo']} </td>
        <td>{$row['departamento']} </td>
        <td>{$row['ciudad']} </td>
        <td>{$row['direccion']} </td>
        <td>{$row['fecha_nacimiento']} </td>
      </tr>";
    }
    ?>
  </tbody>
</table>