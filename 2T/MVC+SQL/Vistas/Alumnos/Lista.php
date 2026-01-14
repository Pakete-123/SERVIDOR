<?php ob_start(); ?>

<h2>Alumnos</h2>
<a href="index.php?controller=alumno&action=crear">Nuevo alumno</a>

<?php foreach ($alumnos as $alumno): ?>
    <h3><?= $alumno->nombre ?></h3>
    <p><?= $alumno->email ?></p>

    <a href="index.php?controller=alumno&action=editar&id=<?= $alumno->id ?>" class="btnEditar">Editar</a>
    |
    <a href="index.php?controller=alumno&action=borrar&id=<?= $alumno->id ?>"
        onclick="return confirm('¿Está seguro que quiere borrar este usuario?')" class="btnBorrar">Borrar</a>

    <?php if (count($alumno->cursos) > 0): ?>
        <ul>
            <?php foreach ($alumno->cursos as $curso): ?>
                <li><?= $curso->nombre ?? 'Curso sin nombre' ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p><em>Sin cursos matriculados</em></p>
    <?php endif; ?>

<?php endforeach; ?>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';