<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Centro de Salud</h1>

    <h3>Acceso a tu Cita Médica</h3>
    
    <form action="verificar.php" method="post">

        <input type="text" name="usr" placeholder="Usuario" required>
        <br>
        <input type="password" name="pwd" placeholder="Contraseña" required>
        <br><br>
        <input type="submit" value="Enviar">

    </form>

</body>
</html>