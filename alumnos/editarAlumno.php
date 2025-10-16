<?php

session_start();

if (!isset($_SESSION["alumnos"])) {
    echo "<p>⚠ No hay alumnos cargados en la sesión</p>";
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editar"])) {

    

}

?>