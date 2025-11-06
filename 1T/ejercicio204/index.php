<?php 

    $nombre = $_POST["nombre"] ?? "";
    $apellido = $_POST["apellido"] ?? "";
    $email = $_POST["email"] ?? "";
    $añoNac = $_POST["añoNac"] ?? "";
    $tel = $_POST["tel"] ?? "";

    echo "<table border='1'>
    <tr>
        <td>Nombre</td>
        <td>$nombre</td>
    </tr>

    <tr>
        <td>Apellido</td>
        <td>$apellido</td>
    </tr>

    <tr>
        <td>Email</td>
        <td>$email</td>
    </tr>

    <tr>
        <td>Año de Nacimiento</td>
        <td>$añoNac</td>
    </tr>

    <tr>
        <td>Teléfono</td>
        <td>$tel</td>
    </tr>

</table>";
    

?>