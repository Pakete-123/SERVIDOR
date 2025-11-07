<?php

nuevoAlumno();

function mostrarDatos()
{
    if (!isset($_GET["editar"]) && !isset($_GET["eliminar"])) { ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Vista</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Curso</th>
                <th>Nota</th>
                <th colspan="2">Acciones</th>
            </tr>
            <?php foreach ($_SESSION["alumnos"] as $index => $al) { ?>
                <tr>
                    <td><?= htmlspecialchars($al["nombre"]) ?></td>
                    <td><?= htmlspecialchars($al["edad"]) ?></td>
                    <td><?= htmlspecialchars($al["curso"]) ?></td>
                    <td><?= htmlspecialchars($al["nota"]) ?></td>
                    <td><a href="?editar=<?= $index ?>"><button>Editar</button></a></td>
                    <td><a href="?eliminar=<?= $index ?>"><button>Eliminar</button></a></td>
                </tr>

            <?php } ?>
        </table>
        <?php
        notaMedia();

        mayorNota();

        ?>
        <a href="nuevoAlumno.php"><button>Añadir Alumno</button></a>

        <hr>
        <a href="<?= reiniciarSesion() ?>"><button>Reiniciar Sesión</button></a>
    <?php } else if (isset($_GET["editar"])) {
        $id = $_GET["editar"];
    ?>
        <form action="vista.php" method="post">

            <label for="nombre">Nombre:
                <input type="text" name="nom" value="<?= $_SESSION["alumnos"][$id]["nombre"] ?>">
            </label>
            <br>
            <label for="nombre">Edad:
                <input type="number" name="edad" value="<?= $_SESSION["alumnos"][$id]["edad"] ?>">
            </label>
            <br>
            <label for="nombre">Curso:
                <input type="text" name="curso" value="<?= $_SESSION["alumnos"][$id]["curso"] ?>">
            </label>
            <br>
            <label for="nombre">Nota:
                <input type="number" name="nota" step="0.1" value="<?= $_SESSION["alumnos"][$id]["nota"] ?>">
            </label>
            <br><br>

            <input type="submit" value="Añadir Alumno">

        <?php    } else if (isset($_GET["eliminar"])) { ?>

        <?php    }
}
function notaMedia()
{

    $media = 0;

    foreach ($_SESSION["alumnos"] as $al) {

        $media += $al["nota"];
    }

    $media = round($media / sizeof($_SESSION["alumnos"]), 2);

        ?>

        <p><b>La nota media es: </b> <?= $media ?></p>

    <?php }

function mayorNota()
{

    $nota = 0;
    $nom = "";

    foreach ($_SESSION["alumnos"] as $al) {

        if ($al["nota"] > $nota) {
            $nota = $al["nota"];
            $nom = $al["nombre"];
        }
    }
    ?>

        <p><b>La mejor nota la tiene</b> <?= htmlspecialchars($nom) ?> con un <?= htmlspecialchars($nota) ?></p>

    <?php }

function nuevoAlumno()
{
    $nom = $_POST["nom"] ?? null;
    $edad = $_POST["edad"] ?? null;
    $curso = $_POST["curso"] ?? null;
    $nota = $_POST["nota"] ?? null;

    if ($nom && $edad && $curso && $nota) {

        $_SESSION["alumnos"][] = [
            "nombre" => $nom,
            "edad" => $edad,
            "curso" => $curso,
            "nota" => $nota
        ];

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
}

function reiniciarSesion()
{
    session_destroy();
}

    ?>