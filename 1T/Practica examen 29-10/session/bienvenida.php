<?php 
session_start();

if (!isset($_SESSION["nombre"]) || !isset($_SESSION["edad"])) {
    echo "No hay datos de sesión. Por favor, regístrese <a href='registro.php'>aquí</a>";
    exit;
};

$nombre = $_SESSION["nombre"];
$edad = $_SESSION["edad"];

echo "Bienvenido $nombre, tienes $edad de edad"
?>