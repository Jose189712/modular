<?php
require "../config/sesiones.php";

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $login = new SesionUsuario();    

    if($login->existeUsuario($correo,$password)){                          
        echo 'true';
    }else{
        echo 'false'; 
    }
    
    
?>