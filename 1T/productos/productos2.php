<?php
session_start();

$_SESSION["productos"] = [
    1 => ["nombre" => "Camiseta", "precio" => "95.99"],
    2 => ["nombre" => "Pantalón", "precio" => "125.50"],
    3 => ["nombre" => "Zapatos", "precio" => "139.90"],
    4 => ["nombre" => "Chaqueta", "precio" => "239.90"],
    5 => ["nombre" => "Anorak", "precio" => "399.20"]
];
if (isset($_GET["reordenar"])) {
    usort($_SESSION["productos"], function ($a, $b) {
        return $b["precio"] <=> $a["precio"];
    });
}
if (isset($_GET["ordenar"])) {
    usort($_SESSION["productos"], function ($a, $b) {
        return $a["precio"] <=> $b["precio"];
    });
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Array</title>
</head>

<body>

    <div class="container">
        <h1>Productos Disponibles</h1>
        <ul>
            <?php
            foreach ($_SESSION["productos"] as $k => $v) { ?>
                <li>Nombre: <?= $v["nombre"] ?>, Precio: <?= $v["precio"] ?>€, con clave <?= $k ?></li>
            <?php }
            ?>
        </ul>
        <form action="buscarProducto.php" method="post">

            <h2>Escribe el nombre del producto</h2>

            <input type="text" placeholder="Ej: camiseta" name="prod" tabindex="1">
            <input type="submit" value="Enviar" tabindex="2">

        </form>
        <hr>
        <form action="precioMinMax.php" method="post">

            <h2>Escribe el precio mínimo y máximo</h2>

            <label for="precioMin">Precio Mínimo
                <input type="number" name="prMin" min="1" max="1000" tabindex="3" required>
            </label>

            <label for="precioMax">Precio Máximo
                <input type="number" name="prMax" min="1" max="1000" tabindex="4" required>
            </label>
            <input type="submit" value="Enviar" tabindex="5">

        </form>
        <hr>
        <a href="?reordenar"><input type="submit" value="Ordenar por precio (Max - Min)" onclick="return confirm('¿Estás seguro de querer reordenar el array?')" tabindex="6"></a>
        <a href="?ordenar"><input type="submit" value="Ordenar por precio (Min - Max)" onclick="return confirm('¿Estás seguro de querer reordenar el array?')" tabindex="7"></a>
    </div>
</body>

</html>