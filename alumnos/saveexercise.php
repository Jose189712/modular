<?php
    session_start();
    require "../config/clasesR.php";

    $alumno = new AlumnoR();

    if (empty($_POST['sesion'])){
        $idSesiones = $alumno->goSession($_SESSION['idAlumnos'])[0]["id"];
        $idSesiones = (int)$idSesiones[0];
    } else {
        $idSesiones = $_POST['sesion'];
    }

    $idEjercicios = $alumno->saveExercise($_POST['respuesta'],$_POST['respondido'],$_POST['area'],$_POST['puntaje'],$_POST['nivel']);    
    
    var_dump((int)$idEjercicios[0]);

    $alumno->relationSE((int)$idEjercicios[0],(int)$idSesiones);

    echo $idSesiones;
?>