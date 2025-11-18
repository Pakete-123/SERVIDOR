<?php
session_start();
require_once "Funciones.php";

// Si no existen preguntas en sesión, iniciar cuestionario
if (!isset($_SESSION['preguntas'])) {
    $_SESSION['preguntas'] = ElegirPreguntas();
    $_SESSION['indice'] = 0;
    $_SESSION['aciertos'] = 0;
}

// Procesar respuesta anterior
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $respuestaUsuario = $_POST['respuesta'];
    $idPregunta = $_POST['id_enunciado'];

    $respuestaCorrecta = ObtenerRespuestaCorrecta($idPregunta);

    $esCorrecta = ConfirmarRespuesta($respuestaUsuario, $respuestaCorrecta);

    LlevarResultados($_SESSION['aciertos'], $esCorrecta);

    MostrarAcierto($esCorrecta, $respuestaCorrecta);

    $_SESSION['indice']++;
}

// Si ya respondió las 10 preguntas → mostrar resultado final
if ($_SESSION['indice'] >= 10) {
    MostrarResultados($_SESSION['aciertos']);

    // Reiniciar cuestionario
    session_destroy();
    exit;
}

// Pregunta actual
$preguntaActual = $_SESSION['preguntas'][$_SESSION['indice']];
?>

<h2>Pregunta <?php echo $_SESSION['indice'] + 1; ?> de 10</h2>
<p><?php echo $preguntaActual['PREGUNTA']; ?></p>

<form method="POST">
    <input type="hidden" name="id_enunciado" value="<?php echo $preguntaActual['ID_ENUNCIADO']; ?>">
    <input type="text" name="respuesta" required autofocus>
    <br><br>
    <button type="submit">Responder</button>
</form>