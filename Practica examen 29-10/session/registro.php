<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["edad"] = $_POST["edad"];

    header("Location: bienvenida.php");
    exit;
};
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    
    <form action="" method="post">

        <label for="nombre">Nombre: 
            <input type="text" name="nombre">
        </label>
        <br>
        <label for="edad">Edad: 
            <input type="number" name="edad" min="0" max="100">
        </label>

        <br><br>

        <input type="submit" value="Enviar">

    </form>

</body>
</html>