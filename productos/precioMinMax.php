<?php
session_start();
$i = 0;

if ($_POST["prMin"] > $_POST["prMax"]) {
    $min = $_POST["prMax"];
    $max = $_POST["prMin"];
} else {
    $min = $_POST["prMin"];
    $max = $_POST["prMax"];
}

foreach ($_SESSION["productos"] as $k => $v) {

    if ($min <= $v["precio"] && $max >= $v["precio"]) {
        $i = 1 ?>

        <p>Nombre: <?= $v["nombre"] ?>, Precio: <?= $v["precio"] ?>€, con clave <?= $k ?></p>
        </p>

    <?php    }
}

if ($i === 0) { ?>

    <p>No se ha encontrado un producto entre <?= $min ?>€ y <?= $max ?>€</p>

<?php }

?>
<p>Pincha <a href="productos2.php">aquí</a> para volver al buscador de productos.</p>