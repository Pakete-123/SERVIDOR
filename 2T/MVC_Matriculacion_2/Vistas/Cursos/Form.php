<?php ob_start(); ?>

<h2>Nuevo Curso</h2>

<form method="post" action="index.php?controller=curso&action=guardar">
    Nombre: <input type="text" name="nombre"><br>
    Duración: <input type="number" name="duracion"><br>
    Precio: <input type="number" step="0.01" name="precio"><br>
    <button>Guardar</button>
</form>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';