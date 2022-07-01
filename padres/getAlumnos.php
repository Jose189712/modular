<?php 
session_start();
require "../config/clasesR.php";

$padre = new PadreR();

$resultado = $padre->getAlumnos($_SESSION['idusuario']);

if (empty($resultado)) {
    echo 0;
} else {
    echo json_encode($resultado);
}
?>