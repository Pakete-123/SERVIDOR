<div class="card">
  <h2>Listado de Ventas</h2>

  <?php if (empty($ventas)): ?>
    <p>No hay ventas registradas.</p>
  <?php else: ?>
    <?php foreach ($ventas as $i => $venta): ?>
      <div style="margin-bottom: 15px; border: 1px solid #ccc; padding: 10px;">
        <strong>Venta #<?= $i + 1 ?></strong><br>
        Fecha: <?= $venta->getFecha() ?><br>
        Hora: <?= $venta->getHora() ?><br><br>

        <ul>
          <?php foreach ($venta->getProductos() as $p): ?>
            <li><?= $p->getNombre() ?> - <?= number_format($p->getPrecio(), 2) ?> €</li>
          <?php endforeach; ?>
        </ul>

        <strong>Total: <?= number_format($venta->total(), 2) ?> €</strong>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <a class="btn" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=form">Nueva Venta</a>
</div>