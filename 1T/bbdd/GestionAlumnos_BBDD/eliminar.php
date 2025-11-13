<?php
require_once("conexion.php");

$id = $_GET['id'];

$sql = $conn->query("DELETE FROM alumnos WHERE IdAlumno = $id");

if ($sql === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
