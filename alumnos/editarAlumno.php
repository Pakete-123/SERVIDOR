<?php

session_start();

if (!isset($_SESSION["alumnos"])) {
    echo "<p>⚠ No hay alumnos cargados en la sesión</p>";
}

if (isset($_POST["editar"])) {

    $index = intval($_POST["index"]);

    if (!isset($_SESSION["alumnos"][$index])) {
        echo "<p>❌ No se ha encontrado el alumno</p>";
        exit;
    }

    $alumno = $_SESSION["alumnos"][$index];

} else if (isset($_POST["guardar"])) {

    $index = intval($_POST["index"]);
    $nom = trim($_POST["nom"]);
    $ape = trim($_POST["ape"]);
    $edad = trim($_POST["edad"]);
    $cicloF = $_POST["cicloF"];
    $curso = $_POST["curso"];

    if($nom && $ape && $edad && $cicloF && $curso) {

        $_SESSION["alumnos"][$index] = [

            "nom" => $nom,
            "ape" => $ape,
            "edad" => $edad,
            "cicloF" => $cicloF,
            "curso" => $curso

        ];

        header("Location: añadirAlumno.php");
        exit;

    } else {
        
    }

}

?>