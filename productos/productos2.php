<?php
session_start();

$_SESSION["productos"] = [
    1 => ["nombre" => "Camiseta", "precio" => "95.99"],
    2 => ["nombre" => "Pantalón", "precio" => "125.50"],
    3 => ["nombre" => "Zapatos", "precio" => "139.90"],
    4 => ["nombre" => "Chaqueta", "precio" => "239.90"],
    5 => ["nombre" => "Anorak", "precio" => "399.20"]
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>

    <form action="buscarProducto.php" method="post">

        <h2>Escribe el nombre del producto</h2>

        <input type="text" placeholder="Ej: camiseta" name="prod">
        <input type="submit" value="Enviar">

    </form>
    <hr>
    <form action="precioMinMax.php" method="post">

        <h2>Escribe el precio mínimo y máximo</h2>

        <label for="precioMin">Precio Mínimo
            <input type="number" name="prMin" min="1" max="1000">
        </label>

        <label for="precioMax">Precio Máximo
            <input type="number" name="prMax" min="1" max="1000">
        </label>
        <input type="submit" value="Enviar">

    </form>
    <hr>
    <form action="ordenarPrecio.php">
        <input type="submit" value="Ordenar por precio (Max - Min)" onclick="return confirm('¿Estás seguro de querer ordenar el array?')">
    </form>

</body>

</html>