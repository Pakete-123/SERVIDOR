<?php
require_once("conexion.php");

$nombre = $_POST['nombre'];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"] ?? null;
$edad = $_POST['edad'];
$ciclo = $_POST["ciclo"];
$curso = $_POST["curso"];
$nota = $_POST["nota"];

$val = $conn->query("SELECT * FROM alumnos WHERE Nombre = '$nombre' AND Apellidos = '$apellidos'");

if ($val->num_rows == 0) {

    $sql = $conn->query("INSERT INTO alumnos (Nombre, Apellidos, Correo, Edad, Ciclo, Curso, Nota) VALUES ('$nombre','$apellidos', '$correo', $edad, '$ciclo', '$curso', $nota)");

    if ($sql === TRUE) {

        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else { ?>

    <p>Ya se encuentra un alumno con esos datos. Pulsa <a href="index.php">aqui</a> para volver</p>

<?php } ?>