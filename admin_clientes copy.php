<?php
session_start();
include "header_admin.php";
include_once "conexion.php";

?>
<h1 >Pedidos</h1>
<table class="overflow-auto">
  <thead>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Departamento</th>
      <th>Ciudad</th>
      <th>Direccion</th>
      <th>Fecha de nacimiento</th>

    </tr>
  </thead>
  <tbody>
    <?php
      $result=$conn->query("SELECT * FROM clientes");
      while($row=$result->fetch_assoc()){
        echo"<tr>
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
    <tr>
      <td></td>
    </tr>
  </tbody>
</table>