<?php 
    require("../config/clasesR.php");
    
    session_start();

    $user_name = $_POST['userName'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $genero = $_POST['genero'];
    
    $update = new AlumnoR();

    $response = $update->update_alumnos($_SESSION['nickName'],$user_name,$apellidoP,$apellidoM,$genero);

    if($response) {
        $_SESSION['nombreAlumno'] = $user_name;            
        $_SESSION['apellidoPA'] = $apellidoP;
        $_SESSION['apellidoMA'] = $apellidoM;
        $_SESSION['genero'] = $genero;        
        echo 'true';
    }else {
        echo 'false';
    }
