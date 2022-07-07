<?php
session_start();
require "../config/clasesR.php";

$alumno = new AlumnoR();

$alumno->updateLevelUser($_SESSION['idAlumnos'],$_POST['level']);

echo $alumno->updateSesion($_POST['sesion']);

?>