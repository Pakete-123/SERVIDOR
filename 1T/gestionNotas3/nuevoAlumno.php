<?php
session_start();

require_once("funciones.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Alumno</title>
</head>

<body>

    <form action="vista.php" method="post">
        <label for="nombre">Nombre:
            <input type="text" name="nom">
        </label>
        <br>
        <label for="nombre">Edad:
            <input type="number" name="edad">
        </label>
        <br>
        <label for="nombre">Curso:
            <input type="text" name="curso">
        </label>
        <br>
        <label for="nombre">Nota:
            <input type="number" name="nota" step="0.1">
        </label>
        <br><br>

        <input type="submit" value="Añadir Alumno">

    </form>

</body>
