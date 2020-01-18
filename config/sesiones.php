<?php
    require "functions.php";

    class SesionAlumnos extends Conexion{
        public function __construct(){
            parent::__construct(); //Toma el constructor de la clase que hereda
        }//fin del constructor de la calse UsuarioR

        public function existeAlumno($name_user,$password){
            if($this->$db != NULL){                
                $statement = $this->$db->prepare("SELECT * FROM alumnos WHERE (name_user='$name_user' AND palabra_secreta='$password')");
                $statement->execute();                
                $resultado = $statement->fetch();                
                if(empty($resultado)) return false;
                else return $this->createSession($resultado);
            }else{
                echo "Error de enlace de datos";
            }//Fin del if detectar problemas en la conexion
        }//Fin del método para buscar los registros
        
        protected function createSession($resultado){
            session_start();
            $_SESSION['nombreAlumno'] = $resultado['nombreAlumno'];            
            $_SESSION['apellidoPA'] = $resultado['apellido_p_Alumno'];
            $_SESSION['apellidoMA'] = $resultado['apellido_m_Alumno'];
            $_SESSION['nickName'] = $resultado['name_user'];
            $_SESSION['genero'] = $resultado['sexo'];
            return true;
        }//fin del método para crear la session
    }//Clase de sesionAlumnos para iniciar la sesion de los alumnos

    class SesionUsuario extends Conexion{
        public function __construct(){
            parent::__construct();
        }

        public function existeUsuario($correo,$password){
            if($this->$db != NULL){                
                $statement = $this->$db->prepare("SELECT * FROM usuarios_e WHERE (correo='$correo' AND password='$password')");
                $statement->execute();
                $resultado = $statement->fetch();                  
                if(empty($resultado)) return false;
                else return $this->createSessionPadre($resultado);               
            }else{
                echo "Error de enlace de datos";
            }
        }//fin de función para checar la existencia de el usuario
        
        public function createSessionPadre($resultado){
            session_start();
            $_SESSION['idusuario'] = $resultado['idUSUARIOS_E'];        
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['apellidoP'] = $resultado['apellidoP'];
            $_SESSION['apellidoM'] = $resultado['apellidoM'];
            $_SESSION['correo'] = $resultado['correo']; 
            return true;         
        }
    }//Fin de la clase SesionUsuario
    
?>