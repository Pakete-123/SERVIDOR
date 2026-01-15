<?php ob_start(); ?>

<h2>Alumnos</h2>
<a href="index.php?controller=alumno&action=crear">Nuevo alumno</a>

<?php foreach ($alumnos as $alumno): ?>
    <h3>
        <?= $alumno->nombre ?>
        <small>
            <a href="index.php?controller=alumno&action=editar&id=<?= $alumno->id ?>">
                Editar
            </a>
            |
            <a href="index.php?controller=alumno&action=borrar&id=<?= $alumno->id ?>"
            onclick="return confirm('¿Seguro que quieres borrar este alumno?')">
                Borrar
            </a>
        </small>
    </h3>

    <p><?= $alumno->email ?></p>

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