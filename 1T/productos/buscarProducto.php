<?php
session_start();

$txt = $_POST["prod"];
$i = 0;

foreach ($_SESSION["productos"] as $k => $v) {

    if (trim(strtolower($txt)) === strtolower($v["nombre"])) {
        $i = 1; ?>

        <p>Nombre: <?= $v["nombre"] ?>, Precio: <?= $v["precio"] ?>€, con clave <?= $k ?></p>
        <p>Pincha <a href="productos2.php">aquí</a> para volver al buscador de productos.</p>

    <?php    }
}

if ($i === 0) { ?>

    <p>No se ha encontrado el producto "<?= $txt ?>". Pincha <a href="productos2.php">aquí</a> para volver al buscador de productos.</p>

<?php
}

?>