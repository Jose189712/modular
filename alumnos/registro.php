<?php 
    require "../config/clasesR.php";

    $alumno = $_POST['name_user'];            
    $nombre = $_POST['nombreA'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $password = $_POST['password'];
    $sexo = $_POST['sexo'];

    $registro = new AlumnoR();    
    $getid = new General();
    
    if($registro->empty_Alumno($alumno) == 'false'){
        echo 0;
    } else{        
        $registro->set_alumnos($alumno,$nombre,$apellidoP,$apellidoM,$password,$sexo,1);
        $id = $getid->getValue("alumnos",$_POST['name_user'],"idALUMNOS","name_user");
        $registro->startSesion($nombre,$apellidoP,$apellidoM,$sexo,$alumno,$id[0]['idALUMNOS']);        
        echo 'Exito';
    }
?>