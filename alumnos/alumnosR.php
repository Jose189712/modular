<?php    
    require ('./config/functions.php');

   class AlumnoR extends Conexion{
       public function __construct(){
           parent::__construct(); //Toma el constructor de la clase que hereda
       }//fin del constructor de la calse UsuarioR
       //Método para conocer si ya existe el nomnbre de usuario ingresado
       public function empty_Alumno($name_user){
           $statement = $db->prepare("SELECT name_user FROM alumnos WHERE name_user='$name_user'");
           $statement->execute();
           if($statement){
               $respuesta = $statement->fetchAll();
               return $respuesta;
           }else{
               return 'false';
           }                
       }//fin del método empty_Alumno
       //Método para registrar a un alumno por el mismo
       public function set_alumnos($name_user,$nombre,$apellidoP,$apellidoM,$password,$sexo){
           $auxiliar_db = $db->prepare("INSERT INTO alumnos(nombreAlumno,apellido_p_Alumno,apellido_m_Alumno,name_user,palabra_secreta,sexo)
           VALUES($nombre,$apellidoP,$apellidoM,$name_user,$password,$sexo)");
           $auxiliar_db->execute();
           return $auxiliar_db;
       }//método para registrar a los alumnos 
   }//fin de la clase UsuarioR

?>