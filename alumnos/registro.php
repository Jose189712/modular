<?php 
    require "../config/clasesR.php";

    $alumno = $_POST['name_user'];            
    $nombre = $_POST['nombreA'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $password = $_POST['password'];
    $sexo = $_POST['sexo'];

    $registro = new AlumnoR();    

    if($registro->empty_Alumno($alumno) == 'false'){
        echo 'Fallo registro nombre de usuario existe';
    }else if(empty($registro->empty_Alumno($alumno)) == 'Error en la conexión'){
        echo 'Error en la conexión a la base de datos';
    }
    else{
        var_dump($registro->set_alumnos($alumno,$nombre,$apellidoP,$apellidoM,$password,$sexo));
        echo 'Exito';
    }
?>