<?php 

session_start();

if (isset($_POST["index"])) {

    $index = (int) $_POST["index"];

    if (isset($_SESSION["alumnos"][$index])) {

        unset($_SESSION["alumnos"][$index]);
    }
}

header("Location: añadirAlumno.php");

?>