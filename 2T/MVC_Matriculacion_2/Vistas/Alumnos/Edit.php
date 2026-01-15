<?php ob_start(); ?>

<h2>Editar Alumno</h2>

<form method="post" action="index.php?controller=alumno&action=actualizar">
    <input type="hidden" name="id" value="<?= $alumno->id ?>">

    Nombre:
    <input type="text" name="nombre" value="<?= $alumno->nombre ?>"><br>

    Email:
    <input type="email" name="email" value="<?= $alumno->email ?>"><br>

    Cursos:<br>
    <select name="cursos[]" multiple>
        <?php foreach ($cursos as $curso): ?>
            <option value="<?= $curso['id'] ?>"
                <?= in_array($curso['id'], array_map(fn($c) => $c->id, $alumno->cursos)) ? 'selected' : '' ?>>
                <?= $curso['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button>Guardar cambios</button>
</form>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';