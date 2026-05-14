<?php
session_start();
include "header_admin.php";
include_once "conexion.php";
$num_clientes = 0;
// Consulta SQL para contar todos los rclientes
$sql_num_clientes = "SELECT COUNT(*) AS total_cientes FROM clientes";
$resultado_num_clientes = $conn->query($sql_num_clientes);

if ($resultado_num_clientes->num_rows > 0) {
    // Obtener el resultado
    $fila = $resultado_num_clientes->fetch_assoc();
    $num_clientes = $fila['total_cientes'];
}

$num_pendientes = 0;
// Consulta SQL para contar todos los pendientes
$sql_num_pendientes = "SELECT COUNT(*) AS total_pendientes FROM pedidos WHERE estado = 'pendiente'";
$resultado_num_pendientes = $conn->query($sql_num_pendientes);

if ($resultado_num_pendientes-> num_rows > 0) {
    // Obtener el resultado
    $fila = $resultado_num_pendientes->fetch_assoc();
    $num_pendientes = $fila['total_pendientes'];
}
   
$num_productos = 0;
// Consulta SQL para contar todos los productos
$sql_num_productos = "SELECT COUNT(*) AS total_productos FROM productos";
$resultado_num_productos = $conn->query($sql_num_productos);

if ($resultado_num_productos->num_rows > 0) {
    // Obtener el resultado
    $fila = $resultado_num_productos->fetch_assoc();
    $num_productos = $fila['total_productos'];
}

?>

<h1 class="fredoka mt-4">
 Inicio
</h1>

<div class="container my-4">

  <!-- Encabezado -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold">Panel de Administración</h2>
      <p class="text-muted">Bienvenido, Admin 👋</p>
    </div>
  </div>

  <!-- Tarjetas de resumen -->
  <div class="row g-3 mb-4">
<!-- clientes ingresadados -->
    <div class="col-md-4">
      <div class="card p-3 text-center">
        <h5>Clientes</h5>
        <h3><?php echo $num_clientes ?></h3>
      </div>
    </div>
   
    <div class="col-md-4">
      <div class="card p-3 text-center">
        <h5>Pedidos pendientes</h5>
        <h3><?php echo $num_pendientes ?></h3>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3 text-center">
        <h5>Productos activos</h5>
        <h3><?php echo $num_productos ?></h3>
      </div>
    </div>
  </div>
 

  <a href="cerrar_sesion.php" class=" btn btn-danger">Cerrar sesion</a>

</div>

<!-- Script para la gráfica -->
<script>
const ctx = document.getElementById('graficaVentas');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
    datasets: [{
      label: 'Ventas ($)',
      data: [2500, 3200, 2800, 4200, 3900, 4700],
      backgroundColor: '#0d6efd'
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>