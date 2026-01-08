<div class="card">
  <h2>Registrar Venta</h2>

  <?php if (!empty($error)) { ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php } ?>

  <form action="<?= $_SERVER["SCRIPT_NAME"] ?>?action=guardar" method="post">
    <label>Selecciona Productos:</label><br>

    <select name="productos[]" multiple size="6" style="width: 100%;">
      <?php foreach ($prodDisp as $pD) { ?>
        <option value="<?= $pD->getId() ?>">
          <?= $pD->getNombre() ?> - <?= number_format($pD->getPrecio(), 2) ?>€
        </option>
      <?php } ?>
    </select>
    <br><br>
    <button class="btn" type="submit">Guardar Venta</button>
  </form>
</div>