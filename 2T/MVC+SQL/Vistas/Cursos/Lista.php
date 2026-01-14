<?php ob_start(); ?>

<h2>Cursos</h2>
<a href="index.php?controller=curso&action=crear">Nuevo curso</a>

<ul>
    <?php foreach ($cursos as $c): ?>
        <li><?= $c->nombre ?> (<?= $c->precio ?> €)</li>
    <?php endforeach; ?>
</ul>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';