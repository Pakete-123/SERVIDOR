<?php 
require_once("conexion.php");

function fraseAleatoria($conn) {

  $stmt = $conn->query("SELECT * FROM preguntas ORDER BY RAND() LIMIT 1");

  if ($fila = $stmt->fetch_assoc()) { ?>

    <tr>
      <td><?= $fila["id_pregunta"] ?></td>
      <td class="esp"><?= $fila["español"] ?></td>
      <td class="eng"><?= $fila["ingles"] ?></td>
    </tr>

<?php  }
}
?>