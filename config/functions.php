<?php

    function connect($server, $db, $user, $pass){
        try{
            $con =new PDO("mysql:host=$server;dbname=$db",$user,$pass);
            return $con;
        }catch(PDOException $e){
            return false;
        }
    }
?>