<?php
require_once "Conexion.php";
$GLOBALS['db'] = $conn;

function ElegirPreguntas() {
    // Seleccionar 10 preguntas aleatorias
    $sql = "SELECT ID_ENUNCIADO, PREGUNTA FROM enunciados ORDER BY RAND() LIMIT 10";
    $resultado = $GLOBALS['db']->query($sql);

    $preguntas = [];
    while ($fila = $resultado->fetch_assoc()) {
        $preguntas[] = $fila;
    }
    return $preguntas;
}

function ObtenerRespuestaCorrecta($id_enunciado) {
    $sql = "SELECT respuesta FROM respuestas WHERE id_enunciado = $id_enunciado LIMIT 1";
    $resultado = $GLOBALS['db']->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        return $fila['respuesta'];
    }
    return null;
}

function ConfirmarRespuesta($respuestaUsuario, $respuestaCorrecta) {
    return strtolower(trim($respuestaUsuario)) === strtolower(trim($respuestaCorrecta));
}

function LlevarResultados(&$aciertos, $esCorrecta) {
    if ($esCorrecta) {
        $aciertos++;
    }
}

function MostrarAcierto($esCorrecta, $respuestaCorrecta) {
    if ($esCorrecta) {
        echo "<p style='color: green;'><b>✔ ¡Correcto!</b></p>";
    } else {
        echo "<p style='color: red;'><b>✘ Incorrecto</b>. La respuesta correcta era: <b>$respuestaCorrecta</b></p>";
    }
}

function MostrarResultados($aciertos) {
    echo "<h2>Resultados del cuestionario</h2>";
    echo "<p>Has acertado <b>$aciertos</b> de 10 preguntas.</p>";
}
?>