<?php 
session_start();

if (!isset($_SESSION["voto"])) {

    $_SESSION["voto"] = [
        "Rock" => 0,
        "Pop" => 0,
        "Metal" => 0,
        "Electrónica" => 0,
        "Reggaeton" => 0
    ];

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Géneros</title>
</head>
<body>

    <h1>Encuesta de géneros musicales</h1>

    <form action="añadirVoto.php" method="post">

        <?php foreach ($_SESSION["voto"] as $gen => $val) { ?>

            <label for="genero"><?= $gen ?>
                <input type="radio" name="genero" value="<?= $gen ?>" required>
            </label>
            <br>

        <?php }; ?>

        <br>
        <button type="submit">Votar</button>

        <br><br>

        <a href="resultados.php">Ver resultados</a>

    </form>
</body>
</html>