<?php

session_start();

if(!isset($_SESSION["alumnos"])) {
    $_SESSION["alumnos"] = [];
};

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nom"])) {

    $nom = trim($_POST["nom"] ?? null);
    $ape = trim($_POST["ape"] ?? null);
    $edad = trim($_POST["edad"] ?? null);
    $cicloF = $_POST["cicloF"] ?? null;
    $curso = $_POST["curso"] ?? null;

    if($nom && $ape && $edad && $cicloF && $curso) {

        $alumno = [

            "nom" => $nom,
            "ape" => $ape,
            "edad" => $edad,
            "cicloF" => $cicloF,
            "curso" => $curso

        ];
    }

    $_SESSION["alumnos"][] = $alumno;
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;

} else {
    echo "<p style = 'color: red;'>⚠ Todos los campos son obligatorios</p>";
}

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnado</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php if (!empty($_SESSION["error"])): ?>
        <p class="error"><?= $_SESSION["error"] ?></p>
        <?php unset($_SESSION["error"]); ?>
    <?php endif; ?>
    <h1>Lista de Alumnado</h1>
    
    <form action="" method="post">

        <label for="nom">Nombre: </label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="ape">Apellido: </label>
        <input type="text" name="ape" id="ape" required>
        <br>
        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" min="18" max="65" required >
        <br>
        <label for="cicloF">Ciclo Formativo: </label>
        <select name="cicloF" id="cicloF" required>
            <option value="">---Seleccionar---</option>
            <option value="ASIR">ASIR</option>
            <option value="DAM">DAM</option>
            <option value="DAW">DAW</option>
        </select>
        <br>
        <label for="curso">Curso: </label>
        <select name="curso" id="curso" required>
            <option value="">---Seleccionar---</option>
            <option value="1º">1º</option>
            <option value="2º">2º</option>
        </select>

        <input type="submit" value="registrar" class="btn">
    </form>

    <h2>Listado de Alumnos Registrados</h2>

    <?php if(!empty($_SESSION["alumnos"])): ?>
    
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Ciclo Formativo</th>
                <th>Curso</th>
                <th colspan="2">Acciones</th>
            </tr>

            <?php foreach($_SESSION["alumnos"] as $index => $al): ?>
                <tr>
                    <td><?= htmlspecialchars($al["nom"]) ?></td>
                    <td><?= htmlspecialchars($al["ape"]) ?></td>
                    <td><?= htmlspecialchars($al["edad"]) ?></td>
                    <td><?= htmlspecialchars($al["cicloF"]) ?></td>
                    <td><?= htmlspecialchars($al["curso"]) ?></td>
                    <td>
                        <form action="editarAlumno.php" method="post" style="display: inline">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit">✍ Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="borrarAlumno.php" method="post" style="display:inline">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" onclick="return confirm('¿Está segur@ de que quiere borrar ese alumno?')">🗑 Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </table>
            
            <?php else: ?>
                <p>📂No hay alumnos registrados aún.</p>
            <?php endif; ?>

</body>
</html>