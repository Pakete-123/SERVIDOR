<?php require_once("funciones.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>nose</title>
</head>
<body>
  
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Direccion</th>
      <th>Genero</th>
      <th>Fecha de nacimiento</th>
      <th>Nick</th>
      <th>Contraseña</th>
      <th colspan="2">Acciones</th>
    </tr>
    <?= mostrarDatos($conn) ?>
  </table>

</body>
</html>