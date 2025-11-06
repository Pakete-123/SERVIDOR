<?php 

$productos = [
    ["nombre" => "Camiseta", "precio" => "95.99"],
    ["nombre" => "Pantalón", "precio" => "125.50"],
    ["nombre" => "Zapatos", "precio" => "139.90"],
    ["nombre" => "Chaqueta", "precio" => "239.90"],
    ["nombre" => "Anorak", "precio" => "399.20"]
];

$masBarato = $productos[0]; 
$masCaro = $productos[0];
$sumaT = 0;
$mediaT = 0;

foreach ($productos as $p) {
    
    // mostrar mas barato
    if ($masBarato["precio"] >= $p["precio"]){

        $masBarato = $p;

    }

    // mostrar mas caro 
    if ($masCaro["precio"] <= $p["precio"]){

        $masCaro = $p;

    }
    
    // mostrar suma total
    $sumaT += $p["precio"];

    // mostrar media 
    $mediaT += $p["precio"];

};

$mediaT = $mediaT / sizeof($productos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    
    <p>Nombre del más barato: <?= $masBarato["nombre"]?>, Precio: <?= $masBarato["precio"]?>€</p>
    <p>Nombre del más caro: <?= $masCaro["nombre"]?>, Precio: <?= $masCaro["precio"]?>€</p>
    <p>Suma total: <?= $sumaT?>€</p>
    <p>Media total: <?= $mediaT?>€</p>

</body>
</html>
