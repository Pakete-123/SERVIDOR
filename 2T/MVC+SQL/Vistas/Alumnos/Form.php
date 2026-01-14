<?php ob_start(); ?>

<h2><?= isset($alumno) ? "Editar Alumno" : "Nuevo Alumno" ?></h2>

<form method="post" action="index.php?controller=alumno&action=guardar">
    <input type="hidden" name="id" value="<?= $alumno->id ?? '' ?>">
    Nombre: <input type="text" name="nombre" value="<?= $alumno->nombre ?? '' ?>"><br>
    Email: <input type="email" name="email" value="<?= $alumno->email ?? '' ?>"><br>

    Cursos (CTRL + click para seleccionar varios):<br>
    <select name="cursos[]" multiple>
        <?php foreach ($cursos as $curso): ?>
            <option value="<?= $curso->id ?>" <?php if (in_array($curso->id, $alumno_cursos ?? [])) {
                  echo "selected";
              } ?>>
                <?= $curso->nombre ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button>Guardar</button>
</form>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';