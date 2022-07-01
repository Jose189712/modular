<?php
require "configDB.php";

    class Conexion{
        var $db = '';       

        public function __construct(){
            $this->db = $this->get_conexion(servidor,baseD,usuario,password);                                
        }
        /*public function get_db(){
            return db;
        }*/
        public function get_conexion($servidor,$base,$usuario,$pass){
            try{                
                $config = new PDO("mysql:host=$servidor;dbname=$base",$usuario,$pass);
                return $config;
            }catch(PDOException $e){                
                return;
            } 
        }//fin de la función que retorna la conexion        
    }//fin de la clase conexión    
?>