<?php

function mostrarDatos()
{ ?>

    <!DOCTYPE html>
    <html lang="en">

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
        </tr>
        <?php foreach ($_SESSION["alumnos"] as $al) { ?>
            <tr>
                <td><?= htmlspecialchars($al["nombre"]) ?></td>
                <td><?= htmlspecialchars($al["edad"]) ?></td>
                <td><?= htmlspecialchars($al["curso"]) ?></td>
                <td><?= htmlspecialchars($al["nota"]) ?></td>
            </tr>

        <?php } ?>
    </table>
    <?php
    notaMedia();

    mayorNota();

    ?>
    <a href="<?= nuevoAlumno() ?>?añadir"><button>Añadir Alumno</button></a>

    <hr>
    <a href="<?= reiniciarSesion() ?>"><button>Reiniciar Sesión</button></a>
<?php
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
    if (isset($_GET["añadir"])) {
        header("Location: nuevoAlumno.php");
        exit;
    }
}

function reiniciarSesion()
{
    session_destroy();
}

if (isset($_GET["nuevo"])) {
    $nom = $_POST["nom"] ?? null;
    $edad = $_POST["edad"] ?? null;
    $curso = $_POST["curso"] ?? null;
    $nota = $_POST["nota"] ?? null;

    if ($nom && $edad && $curso && $nota) {
        $alumno = [
            "nombre" => $nom,
            "edad" => $edad,
            "curso" => $curso,
            "nota" => $nota
        ];

        $_SESSION["alumnos"][] = $alumno;
        header("Location: vista.php");
        exit;
    }
}

?>