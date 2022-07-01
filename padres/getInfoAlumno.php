<?php
require "../config/clasesR.php";

$padre = new PadreR();

//$resultado = $padre->getPuntaje($_POST['idalumno']);

$objeto = array('puntaje' => $padre->getPuntaje($_POST['idalumno'])[0], 'sesiones' => $padre->getSesiones($_POST['idalumno'])[0], 'ejercicios' => $padre->getEjercicios($_POST['idalumno'])[0]);

//echo $objeto['puntaje'];
//echo $objeto['sesiones'];
echo json_encode($objeto);
?>