<?php ob_start(); ?>

<h2>Nuevo Alumno</h2>

<form method="post" action="index.php?controller=alumno&action=guardar">
    Nombre: <input type="text" name="nombre"><br>
    Email: <input type="email" name="email"><br>

    Cursos:<br>
    <select name="cursos[]" multiple>
        <?php foreach ($cursos as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <button>Guardar</button>
</form>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';