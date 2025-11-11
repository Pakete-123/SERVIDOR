<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>CRUD de Alumnos</title>
</head>

<body>
    <h1>Gestión de Alumnos</h1>

    <!-- Formulario de alta -->
    <form action="insertar.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
        <br><br>
        <label>Correo:</label>
        <input type="text" name="correo">
        <br><br>
        <label>Edad:</label>
        <input type="number" name="edad" required>
        <br><br>
        <label>Ciclo:</label>
        <input type="text" name="ciclo" required>
        <br><br>
        <label>Curso:</label>
        <input type="number" name="curso" min="1" max="2" required>
        <br><br>
        <label>Nota:</label>
        <input type="number" name="nota" step="0.01" min="0" max="10" required>
        <br><br>
        <input type="submit" value="Guardar">
    </form>

    <hr>

    <!-- Listado de alumnos -->
    <h2>Listado</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Edad</th>
            <th>Ciclo</th>
            <th>Curso</th>
            <th>Nota</th>
            <th colspan="2">Acciones</th>
        </tr>

        <?php
        $resultado = $conn->query("SELECT * FROM alumnos");

        while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $fila['IdAlumno'] ?></td>
                <td><?= $fila['Nombre'] ?></td>
                <td><?= $fila["Apellidos"] ?></td>
                <td><?= $fila["Correo"] ?></td>
                <td><?= $fila['Edad'] ?></td>
                <td><?= $fila['Ciclo'] ?></td>
                <td><?= $fila['Curso'] ?></td>
                <td><?= $fila['Nota'] ?></td>
                <td><a href="editar.php?id=<?= $fila['IdAlumno'] ?>">Editar</a></td>
                <td><a href="eliminar.php?id=<?= $fila['IdAlumno'] ?>">Eliminar</a></td>
            </tr>
        <?php   }      ?>
    </table>
</body>

</html>