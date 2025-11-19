<?php require_once("Funciones.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Tareas</title>
</head>

<body>

  <h1>Gestión de Tareas</h1>

  <select name="filtro">
    <option value="1" default>-- Todos --</option>
    <option value="2">Pendiente</option>
    <option value="3">Progreso</option>
    <option value="4">Completada</option>
  </select>

  <h2>Listado de tareas</h2>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Titulo</th>
      <th>Estado</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
    <?= obtenerTareas() ?>
  </table>

  <h2>Crear nueva tarea</h2>
  <form action="Funciones.php" method="post">
    <label for="titulo">Titulo *
      <input type="text" name="titulo" required>
    </label>
    <label for="desc">Descripción
      <textarea name="desc"></textarea>
    </label>
    <br><br>
    <button type="submit" name="Crear">Crear</button>
  </form>
</body>

</html>