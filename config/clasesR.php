<?php    
    require ('functions.php');      

    class AlumnoR extends Conexion{
        public function __construct(){
            parent::__construct(); //Toma el constructor de la clase que hereda
        }//fin del constructor de la calse UsuarioR
        //Método para conocer si ya existe el nomnbre de usuario ingresado
        public function empty_Alumno($name_user){                                    
            if($this->$db != NULL){            
                $statement = $this->$db->prepare("SELECT name_user FROM alumnos WHERE name_user='$name_user'");
                $statement->execute();
                $respuesta = $statement->fetchAll();                
                if(empty($respuesta)){                    
                    return 'true';
                }else{
                    return 'false';
                } 
            }else{
                return "Error en la conexion";
            }               
        }//fin del método empty_Alumno
        //Método para registrar a un alumno por el mismo
        public function set_alumnos($name_user,$nombre,$apellidoP,$apellidoM,$password,$sexo){            
            $auxiliar_db = $this->$db->prepare("INSERT INTO alumnos(nombreAlumno,apellido_p_Alumno,apellido_m_Alumno,name_user,palabra_secreta,sexo)
            VALUES('$nombre','$apellidoP','$apellidoM','$name_user','$password','$sexo')");            
            $h = $auxiliar_db->execute();              
            return $h;          
        }//método para registrar a los alumnos 

        public function startSesion($nombre,$apellidoP,$apellidoM,$sexo,$username){
            session_start();            
            $_SESSION['nombreAlumno'] = $nombre;          
            $_SESSION['apellidoPA'] = $apellidoP;
            $_SESSION['apellidoMA'] = $apellidoM;
            $_SESSION['nickName'] = $username;
            $_SESSION['genero'] = $sexo;
        }//Fin del método para que el padre inicie sesion
    }//fin de la clase AlumnoR

    class PadreR extends Conexion{
        public function __construct(){
            parent::__construct();
        }//Fin del constructor        

        //Método para concocer si ya esta registrado el usuario
        public function empty_Padre($correo){
            if($this->$db != NULL){
                $statement = $this->$db->prepare("SELECT correo FROM usuarios_e WHERE correo='$correo'");
                $statement->execute();
                $respuesta = $statement->fetchAll();
                if(empty($respuesta)) return 'true';
                else return 'false';
            }else{
                return "Error en la conexion";
            }//fin del if else para verificar la conexion            
        }//fin de la funcion para verificar si el correo ya existe
        
        public function set_padre($nombre,$apellidoP,$apellidoM,$correo,$password){
            $statement = $this->$db->prepare("INSERT INTO usuarios_e(nombre,apellidoP,apellidoM,correo,password) VALUES('$nombre','$apellidoP','$apellidoM','$correo','$password')");
            $statement->execute();
            $statement1 = $this->$db->prepare("SELECT idUSUARIOS_E FROM usuarios_e WHERE correo='$correo'");
            $statement1->execute();
            $idPadre = $statement1->fetch();
            session_start();
            $_SESSION['idusuario'] = $idPadre['idUSUARIOS_E']; 
            $idPadreConv = $_SESSION['idusuario'];           
            $statement2 = $this->$db->prepare("INSERT INTO padre(USUARIOS_E_idUSUARIOS_E,USUARIOS_E_idUSUARIOS_E1) VALUES($idPadreConv,$idPadreConv)");
            return $statement2->execute();            
        }//fin del método para registrar padres

        public function startSesion($nombre,$apellidoP,$apellidoM,$correo){
            session_start();            
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidoP'] = $apellidoP;
            $_SESSION['apellidoM'] = $apellidoM;
            $_SESSION['correo'] = $correo;
        }//Fin del método para que el padre inicie sesion

        public function registrarAlumnos($nombre,$apellidoP,$apellidoM,$username,$sexo,$passAp){
            $alumno = new AlumnoR();

            $existeAlumno = $alumno->empty_Alumno($username); 

            if($existeAlumno == 'true'){
                if($alumno->set_alumnos($username,$nombre,$apellidoP,$apellidoM,$passAp,$sexo)){
                    session_start();
                    $idPadre = $_SESSION['idusuario'];
                    $idAlumno = $this->getIdAlumno($username)['idALUMNOS'];
                    $statement1 = $this->$db->prepare("SELECT idPADRE FROM padre WHERE USUARIOS_E_idUSUARIOS_E='$idPadre'");
                    $statement1->execute();
                    $h = $statement1->fetch();
                    $idPadre = $h['idPADRE'];
                    $statement = $this->$db->prepare("INSERT INTO alumnos_has_padre(ALUMNOS_idALUMNOS,PADRE_idPADRE) VALUES($idAlumno,$idPadre)");
                    $statement->execute();                    
                    return 1;
                }else{
                    return 'No se ha podido registrar al alumno';
                }//fin del if else
            }else if($existeAlumno == 'false'){
                return 'Los datos ingresados ya existen';
            }else{
                return 'Error de conexión con el servidor';
            }
        }//fin del método para que el padre registre a los alumnos

        //Método para traer el id del alumno registrado
        protected function getIdAlumno($username){
            $statement = $this->$db->prepare("SELECT idALUMNOS FROM alumnos WHERE name_user='$username'");
            $statement->execute();
            return $statement->fetch();
        }//Fin del método para conseguir el id del alumno     
    }//Fin de la clase PadreR    
?>

