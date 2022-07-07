<?php
    session_start();
    require "../config/clasesR.php";

    $dates = new General();

    $response = $dates->getValue('alumnos',$_SESSION['nickName'],'nivel','name_user');    
    if($response == 'NOTFOUND'){
        echo 'Datos no encontrados';
    }else{        
        echo $response[0]['nivel'];
    }
?>