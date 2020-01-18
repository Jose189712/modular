<?php
require "../config/clasesR.php";

    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    
    $registro = new PadreR();

    if($registro->empty_Padre($correo) == 'true'){        
        if($registro->set_padre($nombre,$apellidoP,$apellidoM,$correo,$password)){
            $registro->startSesion($nombre,$apellidoP,$apellidoM,$correo);
            echo 1;
        } 
        else echo 2;
    }else{
        echo 0;
    }

    
?>