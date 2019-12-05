<?php 
    require "alumnosR.php";
    $alumno = $_POST['name_user'];            
    $nombre = $_POST['nombreA'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $password = $_POST['password'];
    $sexo = $_POST['sexo'];

    $registro = new AlumnoR();

    //var_dump($registro->empty_Alumno($alumno));
    

    if($registro->empty_Alumno($alumno) == 'false'){
        echo 'fallo';
    }else if(empty($registro->empty_Alumno($alumno))){
        var_dump($registro->set_alumnos($alumno,$nombre,$apellidoP,$apellidoM,$password,$sexo));
        echo 'Exito';
    }else{
        echo 'existe';
    }//Fin del if else para controlar los registro repetidos
?>