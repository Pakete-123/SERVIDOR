<?php
include("Conexion.php");

function obtenerTareas()
{
  global $conn;

  $sql = $conn->query("SELECT * FROM tareas");

  while ($fila = $sql->fetch_assoc()) { ?>
    <tr>
      <td><?= $fila["id"] ?></td>
      <td><?= $fila["titulo"] ?></td>
      <td><?= $fila["estado"] ?></td>
      <td><?= $fila["fecha_creacion"] ?></td>
      <td><a href="Funciones.php?editar=<?= $fila["id"] ?>">Editar</a> | <a href="Funciones.php?borrar=<?= $fila["id"] ?>">Borrar</a></td>
    </tr>
  <?php  }
}

// Recogemos el post para crear una nueva tarea
if (isset($_POST["Crear"])) {
  $titulo = $_POST["titulo"];
  $desc = $_POST["desc"] ?? "";

  // Llamamos a la funcion para insertar la tarea
  insertarTarea($titulo, $desc);
}

function insertarTarea($titulo, $descripcion)
{
  global $conn;

  $stmt = $conn->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (?, ?)");
  $stmt->bind_param("ss", $titulo, $descripcion);

  if ($stmt->execute()) {
    header("Location: GestionTareas.php");
    exit;
  }
}

function obtenerTarea($id)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM tareas WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    return $stmt;
  }
}

if (isset($_GET["editar"])) {
 
  $id = $_GET["editar"];

  $sql = obtenerTarea($id);

  if ($fila = $sql->get_result()->fetch_assoc()) { ?>

  <h2>Editando tarea #<?= $fila["id"] ?></h2>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $fila["id"] ?>">
      <label for="titulo">Titulo *
        <input type="text" name="titulo" value="<?= $fila["titulo"] ?>" required>
      </label>
      <label for="desc">Descripción
        <textarea name="desc" ><?= $fila["descripcion"] ?></textarea>
      </label>
      <label for="estado">Estado
        <select name="estado">
          <option value="progreso" <?= $fila["estado"] == "progreso" ? "selected" : "" ?>>Progreso</option>
          <option value="pendiente" <?= $fila["estado"] == "prendiente" ? "selected" : "" ?>>Pendiente</option>
          <option value="completada" <?= $fila["estado"] == "completada" ? "selected" : "" ?>>Completada</option>
        </select>
      </label>
      <br><br>
      <button type="submit" name="Actualizar">Actualizar</button>
    </form>


<?php  }
}

if (isset($_POST["Actualizar"])) {
  $id = $_POST["id"];
  $titulo = $_POST["titulo"];
  $desc = $_POST["desc"];
  $estado = $_POST["estado"];

  editarTarea($id, $titulo, $desc, $estado);
}

function editarTarea($id, $titulo, $descripcion, $estado)
{
  global $conn;

  $stmt = $conn->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, estado = ? WHERE id = ?");
  $stmt->bind_param("sssi", $titulo, $descripcion, $estado, $id);

  if ($stmt->execute()) {
    header("Location: GestionTareas.php");
    exit;
  }
}

if (isset($_GET["borrar"])) {
  $id = $_GET["borrar"];
  echo "ola";
  borrarTarea($id);
}

function borrarTarea($id)
{
  global $conn;
  $stmt = $conn->prepare("DELETE FROM tareas WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: GestionTareas.php");
    exit;
  }
}
