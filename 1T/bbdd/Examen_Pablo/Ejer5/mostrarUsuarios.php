<?php 
require ("conexion.php");
function mostrarDatos() {
  global $conn;

  $sql = $conn->query("SELECT * FROM usuarios ORDER BY fecha_registro DESC");

  while ($fila = $sql->fetch_assoc()) { ?>

    <tr>
      <td><?= $fila["id"] ?></td>
      <td><?= $fila["nombre"] ?></td>
      <td><?= $fila["email"] ?></td>
      <td><?= $fila["fecha_registro"] ?></td>
    </tr>

<?php  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejer5</title>
</head>
<body>
  
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
    <?= mostrarDatos() ?>
  </table>

</body>
</html>