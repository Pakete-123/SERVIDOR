<?php
require_once("conexion.php");

//Añadir usuario
if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $genero = $_POST["genero"];
    $fnac = $_POST["fnac"];
    $nick = $_POST["nick"];
    $contraseña = $_POST["contraseña"];

    $val = $conn->query("SELECT * FROM usuarios WHERE NICK = '$nick'");

    if ($val->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO usuarios (NOMBRE, APELLIDOS, DIRECCION, GENERO, F_NACIMIENTO, NICK, PASSWORD) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssss", $nombre, $apellidos, $direccion, $genero, $fnac, $nick, $contraseña);

        if ($stmt->execute()) {
            header("Location: introducirUsuario.php");
            exit;
        } else {
            return ?> <script>
                alert("Algo ha salido mal al introducir el usuario");
            </script>
        <?php        }
        $stmt->close();
    }
}


//Actualizar usuario
if (isset($_POST["actualizar"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $genero = $_POST["genero"];
    $fnac = $_POST["fnac"];
    $nick = $_POST["nick"];
    $contraseña = $_POST["contraseña"];

    $stmt = $conn->prepare("UPDATE usuarios SET NOMBRE = ?, APELLIDOS = ?, DIRECCION = ?, GENERO = ?, F_NACIMIENTO = ?, NICK = ?, PASSWORD = ? WHERE ID_USUARIO = ?");
    $stmt->bind_param("sssssssi", $nombre, $apellidos, $direccion, $genero, $fnac, $nick, $contraseña, $id);

    if ($stmt->execute()) {
        header("Location: introducirUsuario.php");
        exit;
    } else { ?>
        <script>
            alert('Error al actualizar usuario');
        </script>
    <?php    }
}

//Mostrar los usuarios
function listarUsuarios($conn)
{

    $resultado = $conn->query("SELECT * FROM usuarios");

    while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?= $fila['ID_USUARIO'] ?></td>
            <td><?= $fila['NOMBRE'] ?></td>
            <td><?= $fila["APELLIDOS"] ?></td>
            <td><?= $fila["DIRECCION"] ?></td>
            <td><?= $fila['GENERO'] ?></td>
            <td><?= $fila['F_NACIMIENTO'] ?></td>
            <td><?= $fila['NICK'] ?></td>
            <td><a href="funciones.php?editar=<?= $fila['ID_USUARIO'] ?>" class="editar">✍ Editar</a></td>
            <td><a href="funciones.php?eliminar=<?= $fila['ID_USUARIO'] ?>" class="eliminar" onclick="return confirm('¿Está seguro que quiere eliminar el usuario?')">🗑 Eliminar</a></td>
        </tr>
    <?php   }
}

//Formulario para editar el usuario
if (isset($_GET["editar"])) {

    $id = $_GET["editar"];

    $resultado = $conn->query("SELECT * FROM usuarios WHERE ID_USUARIO = $id");
    $usuario = $resultado->fetch_assoc();

    if ($usuario) { ?>
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
                <option value="M" <?= $usuario['GENERO'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                <option value="F" <?= $usuario['GENERO'] == 'F' ? 'selected' : '' ?>>Femenino</option>
                <option value="O" <?= $usuario['GENERO'] == 'O' ? 'selected' : '' ?>>Otro</option>
            </select><br>

            <label>Fecha Nacimiento:</label>
            <input type="date" name="fnac" value="<?= $usuario['F_NACIMIENTO'] ?>"><br>

            <label>Nick:</label>
            <input type="text" name="nick" value="<?= $usuario['NICK'] ?>"><br>

            <label>Contraseña:</label>
            <input type="password" name="contraseña" value="<?= $usuario['PASSWORD'] ?>"><br>

            <button type="submit" name="actualizar">Actualizar</button>
        </form>
<?php
    }
}

//Eliminar usuario
if (isset($_GET["eliminar"])) {

    $id = $_GET["eliminar"];

    $sql = $conn->query("DELETE FROM usuarios WHERE ID_USUARIO = $id");

    if ($sql === true) {
        header("Location: introducirUsuario.php");
        exit;
    }
}

?>