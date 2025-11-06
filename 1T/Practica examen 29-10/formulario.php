<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nombre"];
    $edad = $_POST["edad"];

    echo "<h2>Hola, $nom, ¡tienes $edad años!</h2>";
} else { ?>

<form action="" method="post">

    <label for="nombre">Nombre: 
        <input type="text" name="nombre">
    </label>
    <br>
    <label for="edad">Edad: 
        <input type="number" name="edad" min="0" max="100">
    </label>

    <br><br>

    <input type="submit" value="Enviar">

</form>

<?php } ?>