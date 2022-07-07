<?php
    session_start();
    require "../config/clasesR.php";

    $alumno = new AlumnoR();

    if (empty($_POST['sesion'])){
        $idSesiones = $alumno->goSession($_SESSION['idAlumnos'])[0];        
        $idSesiones = (int)$idSesiones;
    } else {
        $idSesiones = $_POST['sesion'];
    }

    $idEjercicios = $alumno->saveExercise($_POST['respuesta'],$_POST['respondido'],$_POST['area'],$_POST['puntaje'],$_POST['nivel']);        

//    var_dump($idSesiones." saveexercise");

    $alumno->relationSE((int)$idEjercicios[0],(int)$idSesiones);

    echo $idSesiones;
?>