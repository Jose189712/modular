<?php
session_start();
require "../config/clasesR.php";

    $nombre = $_POST['nombreAp'];
    $apellidoP = $_POST['apellidoPAp'];
    $apellidoM = $_POST['apellidoMAp'];
    $username = $_POST['nombreUAp'];
    $sexo = $_POST['sexo'];
    $passAp = $_POST['passAp'];

    $padre = new PadreR();

    echo $padre->registrarAlumnos($nombre,$apellidoP,$apellidoM,$username,$sexo,$passAp,1,$_SESSION['idusuario']);
    // Este método retornara una cadena

?>