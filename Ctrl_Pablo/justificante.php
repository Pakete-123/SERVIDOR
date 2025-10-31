<?php 
session_start();

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justificante Cita</title>
</head>
<body>
    
    <h1>🩺 Justificante de Cita Médica</h1>

    <p><b>Nombre:</b> <?= htmlspecialchars($_SESSION["login"]["nombre"] . " " . $_SESSION["login"]["apellidos"]) ?></p>
    <p><b>Usuario:</b> <?= htmlspecialchars($_SESSION["login"]["username"]) ?></p>
    <p><b>Fecha:</b> <?= htmlspecialchars($_SESSION["login"]["fecha_cita"]) ?></p>
    <p><b>Hora:</b> <?= htmlspecialchars($_SESSION["login"]["hora_cita"]) ?></p>
    <p><i>Este justificante confirma que el paciente tiene una cita médica programada.</i></p>
    <hr>
    <p>Centro de Salud - Sistema de Citas Médicas</p>
    <br>
    <a href="?logout" onclick="return confirm('¿Estás seguro de querer cerrar la sesión, <?= htmlspecialchars($_SESSION['login']['nombre'])?>?')"><button>Cerrar Sesión</button></a>

</body>
</html>