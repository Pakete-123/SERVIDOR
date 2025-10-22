<?php 
session_start();

if (isset($_SESSION["usuario"])) {
    $usr = $_SESSION["usuario"];
    $rol = $_SESSION["rol"];
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sesión iniciada</title>
        <link rel="stylesheet" href="loginStyle.css">
    </head>
    <body>
        
        <h2>Bienvenid@, <?= htmlspecialchars($usr)?></h2>
        <h4>Tu rol es <?= htmlspecialchars($rol)?></h4>

        <?php if ($rol === "admin"): ?>
            <p>Eres administrador. Sólo tú puedes ver esto, a demás de administrar la página web.</p>
            <a href="../alumno/añadirAlumno.php">Lista de alumnos</a>
        <?php elseif ($rol === "usuario"): ?>
            <p>Eres usuario. Estás registrado en esta página web.</p>
        <?php endif ?>
        <br>
        <a href="?logout=1">Cerrar Sesión</a>
    </body>
    </html>

    <?php 

    if (isset($_GET["logout"])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }

    exit;

} else {
    echo "<h1 style='color: red; text-align: center'>❌No estás registrado❌</h1>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <form action="verify.php" method="post">
            
                <label for="usr">Usuario: </label>
                <input type="text" name="usr" required>

                <br>

                <label for="pwd">Contraseña: </label>
                <input type="password" name="pwd" required>

                <br>
                <br>

                <input type="submit" value="Enviar">

            </form>
        </div>
    </div>
</body>
</html>
