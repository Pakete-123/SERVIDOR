<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Mini Sistema de Ventas</title>
  <style>
    body {
      font-family: Arial;
      max-width: 800px;
      margin: 20px auto;
    }

    .card {
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 6px;
      margin-bottom: 20px;
    }

    .btn {
      display: inline-block;
      padding: 8px 12px;
      background: #2d6cdf;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }

    .btn-danger {
      background: #b21f2d;
    }

    .error {
      color: #b21f2d;
      margin-bottom: 10px;
    }

    header nav a {
      margin-right: 10px;
    }
  </style>
</head>

<body>

  <header>
    <h1>Mini Sistema de Ventas</h1>
    <nav>
      <a class="btn" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=form">Nueva Venta</a>
      <a class="btn" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=lista">Ver Ventas</a>
      <a class="btn btn-danger" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=borrar">Borrar Todo</a>
    </nav>
  </header>

  <hr>

  <main>
    <?= $contenido ?>
  </main>

</body>

</html>