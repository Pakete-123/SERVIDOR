<?php require_once("funciones.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>CRUD de Alumnos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Gestión de Usuarios</h1>

    <!-- Formulario de alta -->
    <form action="funciones.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
        <br><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" required>
        <br><br>
        <label>Género:</label>
        <select name="genero" required>
            <option value="O" default>Otro</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        <label>F. Nacimiento:</label>
        <input type="date" name="fnac" required>
        <br><br>
        <label>Nick:</label>
        <input type="text" name="nick" required>
        <label>Contraseña:</label>
        <input type="password" name="contraseña" required>
        <br><br>
        <button type="submit" value="Guardar">Guardar</button>
    </form>

    <hr>

    <h2>Listado</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Género</th>
            <th>F. Nacimiento</th>
            <th>Nick</th>
            <th colspan="2">Acciones</th>
        </tr>

        <?= listarUsuarios($conn) ?>

    </table>
    <br><br>

    <a href="funciones.php?logout"><button>Cerrar Sesión</button></a>

</body>

</html>