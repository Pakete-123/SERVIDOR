<?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $db = "examen1eval";

    $conn = new mysqli($servidor, $usuario, $pwd, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
