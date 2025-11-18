<?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $db = "idiomas";

    $conn = new mysqli($servidor, $usuario, $pwd, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
