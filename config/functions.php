<?php
require "configDB.php";

    class Conexion{
        protected $db;

        public function __construct(){
            try{
                $this->$db = new PDO("mysql:host=".servidor.";dbname=".seducativo,usuario,password);
            }catch(PDOException $e){
                echo "fallo";
                return;
            }                   
        }
    }//fin de la clase conexión    
?>