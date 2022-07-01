<?php
session_start();
require "../config/clasesR.php";

$nombre = $_POST['nombreP'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoMP'];

$padre = new PadreR();

echo $padre->modifyInfo($_SESSION['idusuario'],$nombre,$apellidoP,$apellidoM);

?>