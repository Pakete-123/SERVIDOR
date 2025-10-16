<?php 

session_start();

if (isset($_POST["index"])) {

    $index = (int) $_POST["index"];

    if (isset($_SESSION["alumnos"][$index])) {
        unset($_SESSION["alumnos"][$index]);
        $_SESSION["alumnos"] = array_values($_SESSION["alumnos"]);
    }
}

header("Location: añadirAlumno.php");

?>