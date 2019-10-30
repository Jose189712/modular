<?php 
    require "alumnosR.php";
    $alumno = $_POST['name_user'];
    $nombre = $_POST['nombreA'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $password = $_POST['password'];
    $sexo = $_POST['sexo'];

    $registro = new AlumnosR();

    if(!$registro->empty_Alumno($alumno)){
        echo 'fallo';
    }else if(!empty($registro->empty_Alumno($alumno))){
        echo $registro->set_alumnos($alumno,$nombre,$apellidoP,$apellidoM,$password,$sexo);
    }else{
        return 'existe';
    }//Fin del if else para controlar los registro repetidos
    

?>