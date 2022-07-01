<?php
require '../config/clasesR.php';

$padre = new PadreR();

echo json_encode($padre->getInfoAlumnos($_POST['idAlumno']));
?>