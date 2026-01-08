<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "matriculacion_mvc";

$conn = new mysqli($host, $user, $pass, $db);

// Comprobar conexión
if ($conn->connect_error) {
  die("Error de conexión: $conn->connect_error");
}
