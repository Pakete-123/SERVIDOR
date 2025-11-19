<?php
require_once("conexion.php");

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

function mostrarDatos($conn)
{

  $sql = $conn->query("SELECT * FROM usuarios");

  while ($fila = $sql->fetch_assoc()) { ?>

    <tr>
      <td><?= $fila["ID_USUARIO"] ?></td>
      <td><?= $fila["NOMBRE"] ?></td>
      <td><?= $fila["APELLIDOS"] ?></td>
      <td><?= $fila["DIRECCION"] ?></td>
      <td><?= $fila["GENERO"] ?></td>
      <td><?= $fila["F_NACIMIENTO"] ?></td>
      <td><?= $fila["NICK"] ?></td>
      <td><?= $fila["PASSWORD"] ?></td>
      <td><a href="funciones.php?editar=<?= $fila['ID_USUARIO'] ?>" class="editar">Editar</a></td>
      <td><a href="funciones.php?eliminar=<?= $fila['ID_USUARIO'] ?>" class="borrar">Eliminar</a></td>
    </tr>

  <?php  }
}

if (isset($_GET["editar"])) {

  $id = $_GET["editar"];

  $res = $conn->query("SELECT * FROM usuarios WHERE ID_USUARIO = $id");
  if ($usuario = $res->fetch_assoc()) { ?>

    <form method="post" action="funciones.php">
      <input type="hidden" name="id" value="<?= $usuario['ID_USUARIO'] ?>">

      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?= $usuario['NOMBRE'] ?>"><br>

      <label>Apellidos:</label>
      <input type="text" name="apellidos" value="<?= $usuario['APELLIDOS'] ?>"><br>

      <label>Dirección:</label>
      <input type="text" name="direccion" value="<?= $usuario['DIRECCION'] ?>"><br>

      <label>Género:</label>
      <select name="genero">
        <option value="M" <?= $usuario["GENERO"] == "M" ? "selected" : "" ?>>Masculino</option>
        <option value="F" <?= $usuario["GENERO"] == "F" ? "selected" : "" ?>>Femenino</option>
        <option value="O" <?= $usuario["GENERO"] == "O" ? "selected" : "" ?>>Otro</option>
      </select><br>

      <label>Fecha Nacimiento:</label>
      <input type="date" name="fnac" value="<?= $usuario['F_NACIMIENTO'] ?>"><br>

      <label>Nick:</label>
      <input type="text" name="nick" value="<?= $usuario['NICK'] ?>"><br>

      <label>Contraseña:</label>
      <input type="password" name="contrasena" value="<?= $usuario['PASSWORD'] ?>"><br>

      <button type="submit" name="Actualizar">Actualizar</button>
    </form>


<?php  }
}

if (isset($_GET["eliminar"])) {

  $id = $_GET["eliminar"];

  $sql = $conn->query("DELETE FROM usuarios WHERE ID_USUARIO = $id");

  if ($sql === true) {
    header("Location: index.php");
    exit;
  }
}

if (isset($_POST["Actualizar"])) {

  $id = $_POST["id"];
  $nom = $_POST["nombre"];
  $ape = $_POST["apellidos"];
  $dir = $_POST["direccion"];
  $gen = $_POST["genero"];
  $fnac = $_POST["fnac"];
  $nick = $_POST["nick"];
  $pwd = $_POST["contrasena"];

  $stmt = $conn->prepare("UPDATE usuarios SET NOMBRE = ?, APELLIDOS = ?, DIRECCION = ?, GENERO = ?, F_NACIMIENTO = ?, NICK = ?, PASSWORD = ? WHERE ID_USUARIO = ?");
  $stmt->bind_param("sssssssi", $nom, $ape, $dir, $gen, $fnac, $nick, $pwd, $id);

  if ($stmt->execute()) {
    header("Location: index.php");
    exit;
  }

}
?>