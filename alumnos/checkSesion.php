<?php 
session_start();
require "../config/clasesR.php";

$alumno = new AlumnoR();

$array = array('ejercicios' => (int)$alumno->checkEjercicioOfSesion($_SESSION['idAlumnos'])[0], 'sesion' => (int)$alumno->getSesion($_SESSION['idAlumnos'])[0]);

echo json_encode($array);

?>