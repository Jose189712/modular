<?php
require "../config/clasesR.php";

    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    
    $registro = new PadreR();

    //echo $registro->empty_Padre($correo);
    if($registro->empty_Padre($correo)){        
        echo $registro->set_padre($nombre,$apellidoP,$apellidoM,$correo,$password);                    
    } else {
        echo 'Ya existe';
    }

    
?>