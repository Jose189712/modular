<?php
    require "../config/sesiones.php";
    
    $nickName = $_POST['name_userL'];
    $password = $_POST['passwordL'];
    
    $login = new SesionAlumnos();
    
    if($login->existeAlumno($nickName,$password)){
        echo 'true';
    }else{
        echo 'false';
    }
?>